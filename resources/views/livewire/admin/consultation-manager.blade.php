<div>
    <x-admin-layout :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Citas Médicas',
            'href' => route('admin.appointments.index'),
        ],
        [
            'name' => 'Consulta: ' . ($appointment->patient->user->name ?? 'Paciente'),
            'href' => '#',
        ]
    ]">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-user-injured text-indigo-500"></i>
                        Paciente: {{ $appointment->patient->user->name ?? 'Desconocido' }}
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                        <i class="fa-regular fa-calendar-check mr-1"></i> Fecha: {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }} | 
                        <i class="fa-regular fa-clock mx-1"></i> Horario: {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                        <i class="fa-solid fa-user-doctor mr-1"></i> Médico: {{ $appointment->doctor->user->name ?? 'Desconocido' }}
                    </p>
                    @if($appointment->reason)
                        <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-md border-l-4 border-indigo-500">
                            <strong>Motivo:</strong> {{ $appointment->reason }}
                        </div>
                    @endif
                </div>

                <button wire:click="$toggle('showHistoryModal')" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left"></i> Consultas Anteriores
                </button>
            </div>
        </div>

        <!-- TABS -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="border-b border-gray-200 dark:border-gray-700 flex">
                <button wire:click="$set('activeTab', 'consulta')" class="w-1/2 py-4 px-6 text-center text-sm font-medium focus:outline-none transition-colors duration-200 {{ $activeTab === 'consulta' ? 'border-b-2 border-indigo-500 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700/50' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300' }}">
                    <i class="fa-solid fa-stethoscope mr-2"></i> Detalles de Consulta
                </button>
                <button wire:click="$set('activeTab', 'receta')" class="w-1/2 py-4 px-6 text-center text-sm font-medium focus:outline-none transition-colors duration-200 {{ $activeTab === 'receta' ? 'border-b-2 border-indigo-500 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700/50' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300' }}">
                    <i class="fa-solid fa-pills mr-2"></i> Receta Médica
                </button>
            </div>

            <div class="p-6">
                <!-- CONSULTA TAB -->
                @if($activeTab === 'consulta')
                    <div class="space-y-6">
                        <div>
                            <label for="diagnosis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Diagnóstico <span class="text-red-500">*</span></label>
                            <textarea wire:model="diagnosis" id="diagnosis" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Escriba el diagnóstico del paciente..."></textarea>
                            @error('diagnosis') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="treatment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tratamiento e Indicaciones <span class="text-red-500">*</span></label>
                            <textarea wire:model="treatment" id="treatment" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Describa el tratamiento o indicaciones generales..."></textarea>
                            @error('treatment') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas Adicionales</label>
                            <textarea wire:model="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Cualquier otra observación relevante..."></textarea>
                        </div>
                    </div>
                @endif

                <!-- RECETA TAB -->
                @if($activeTab === 'receta')
                    <div class="space-y-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Medicamentos Prescritos</h3>
                            <button wire:click="addMedication" type="button" class="text-sm bg-indigo-100 hover:bg-indigo-200 text-indigo-700 py-1.5 px-3 rounded transition-colors duration-200">
                                <i class="fa-solid fa-plus mr-1"></i> Añadir Medicamento
                            </button>
                        </div>

                        @if(empty($medications))
                            <p class="text-sm text-gray-500 dark:text-gray-400 italic">No hay medicamentos añadidos a esta receta.</p>
                        @endif

                        @foreach($medications as $index => $medication)
                            <div class="flex items-start gap-4 p-4 mb-3 bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-100 dark:border-gray-700">
                                <div class="flex-1 space-y-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">Medicamento</label>
                                        <input wire:model="medications.{{ $index }}.name" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Ej. Paracetamol 500mg">
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex-1">
                                            <label class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">Dosis / Vía</label>
                                            <input wire:model="medications.{{ $index }}.dosage" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Ej. 1 tableta oral">
                                        </div>
                                        <div class="flex-1">
                                            <label class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">Frecuencia / Duración</label>
                                            <input wire:model="medications.{{ $index }}.frequency" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm" placeholder="Ej. Cada 8 hrs por 5 días">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-6">
                                    <button wire:click="removeMedication({{ $index }})" type="button" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-md transition-colors duration-200" title="Eliminar medicamento">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Botones Generales -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700 flex items-center justify-end gap-4">
                <a href="{{ route('admin.appointments.index') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                    Cancelar
                </a>
                <button wire:click="saveConsultation" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                    Finalizar Consulta
                </button>
            </div>
        </div>

        <!-- MODAL DE HISTORIAL CLÍNICO -->
        @if($showHistoryModal)
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                <!-- Overlay -->
                <!-- <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" wire:click="$toggle('showHistoryModal')"></div> -->
                
                <!-- Modal Content -->
                <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-3xl w-full max-h-[85vh] overflow-hidden flex flex-col transform transition-all border border-gray-200 dark:border-gray-700">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center bg-gray-50 dark:bg-gray-900">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                            <i class="fa-solid fa-clock-rotate-left text-teal-500"></i>
                            Historial Clínico: {{ $appointment->patient->user->name ?? 'Paciente' }}
                        </h2>
                        <button wire:click="$toggle('showHistoryModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>
                    
                    <!-- Body -->
                    <div class="p-6 overflow-y-auto flex-1 bg-white dark:bg-gray-800">
                        @if($previousConsultations->isEmpty())
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <i class="fa-regular fa-folder-open text-4xl mb-3 opacity-50 block"></i>
                                No existen consultas previas registradas para este paciente.
                            </div>
                        @else
                            <div class="space-y-6">
                                @foreach($previousConsultations as $prevConsultation)
                                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-5 bg-white dark:bg-gray-800/50 shadow-sm relative overflow-hidden">
                                        <!-- Timeline marker -->
                                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-teal-500"></div>
                                        
                                        <div class="flex justify-between items-start mb-3">
                                            <div>
                                                <h4 class="font-semibold text-gray-800 dark:text-white text-lg">
                                                    {{ \Carbon\Carbon::parse($prevConsultation->date)->format('d \d\e F, Y') }}
                                                </h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    Atendido por: Dr. {{ $prevConsultation->doctor->user->name ?? 'Desconocido' }}
                                                </p>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                Completada
                                            </span>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                            <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded">
                                                <span class="text-xs font-bold uppercase text-gray-500 dark:text-gray-400 mb-1 block">Razón de la Cita</span>
                                                <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $prevConsultation->reason ?: 'No especificada' }}</p>
                                            </div>
                                            <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded">
                                                <span class="text-xs font-bold uppercase text-gray-500 dark:text-gray-400 mb-1 block">Estatus</span>
                                                <p class="text-gray-700 dark:text-gray-300 text-sm">Registro completado (ID: {{ $prevConsultation->id }})</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-right">
                        <button wire:click="$toggle('showHistoryModal')" class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 font-medium py-2 px-4 rounded-lg shadow-sm transition duration-200">
                            Cerrar Historial
                        </button>
                    </div>
                </div>
            </div>
            <!-- Overlay background outside of the modal to prevent form click events passing through -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" wire:click="$toggle('showHistoryModal')"></div>
        @endif
    </x-admin-layout>
</div>

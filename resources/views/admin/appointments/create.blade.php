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
            'name' => 'Nueva Cita',
            'href' => route('admin.appointments.create'),
        ]
    ]">

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Agendar Nueva Cita Médica</h1>

        <form action="{{ route('admin.appointments.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Select Paciente -->
                <div>
                    <label for="patient_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Paciente <span class="text-red-500">*</span></label>
                    <select id="patient_id" name="patient_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                        <option value="">Seleccione un paciente</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->user->name ?? 'Paciente ' . $patient->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Select Doctor -->
                <div>
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Doctor <span class="text-red-500">*</span></label>
                    <select id="doctor_id" name="doctor_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                        <option value="">Seleccione un doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->user->name ?? 'Doctor ' . $doctor->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Fecha -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Cita <span class="text-red-500">*</span></label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                    @error('date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hora Inicio -->
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de Inicio <span class="text-red-500">*</span></label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                    @error('start_time')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hora Fin -->
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de Término <span class="text-red-500">*</span></label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                    @error('end_time')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Motivo -->
            <div class="mb-6">
                <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Motivo de la Cita</label>
                <textarea id="reason" name="reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">{{ old('reason') }}</textarea>
                @error('reason')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Describe brevemente la razón por la que el paciente ha solicitado la cita.</p>
            </div>

            <!-- Botones -->
            <div class="flex items-center justify-end gap-4 mt-8">
                <a href="{{ route('admin.appointments.index') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                    Cancelar
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar Cita
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>

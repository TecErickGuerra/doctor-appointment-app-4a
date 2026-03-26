<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importación Masiva de Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <h3 class="text-lg font-medium text-gray-900 mb-4">Sube tu archivo Excel o CSV</h3>
                <p class="text-sm text-gray-600 mb-6">
                    El archivo debe contener las siguientes columnas exactas: <br>
                    <span class="font-mono bg-gray-100 p-1 rounded">nombre_completo, correo, telefono, fecha_nacimiento, tipo_sangre, alergias</span>
                </p>

                @if (session()->has('message'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                <form wire:submit.prevent="import" class="space-y-4">
                    
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Haz clic para subir</span> o arrastra y suelta tu archivo</p>
                                <p class="text-xs text-gray-500">Formatos soportados: XLS, XLSX, CSV (MAX. 10MB)</p>
                            </div>
                            <!-- Accept specific formats natively -->
                            <input id="dropzone-file" type="file" wire:model="file" class="hidden" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </label>
                    </div>

                    @error('file') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror

                    <!-- Upload Progress indicator -->
                    <div wire:loading wire:target="file" class="text-sm text-blue-600 font-medium">
                        Cargando archivo al servidor... Espera un momento.
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="import">
                            <span wire:loading.remove wire:target="import">
                                Iniciar Importación Masiva
                            </span>
                            <span wire:loading wire:target="import">
                                Procesando Petición...
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

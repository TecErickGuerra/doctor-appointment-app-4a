<x-admin-layout title="Editar Doctor | Healthify" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Doctores', 'href' => route('admin.doctors.index')],
    ['name' => 'Editar'],
]">
    <x-card class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold text-lg">
                    {{ strtoupper(substr($doctor->nombre, 0, 1)) }}{{ strtoupper(substr($doctor->apellido, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold text-gray-800 text-lg">{{ $doctor->nombre }} {{ $doctor->apellido }}</p>
                    <p class="text-sm text-gray-500">Licencia: {{ $doctor->numero_licencia_medica ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.doctors.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Volver
                </a>
                <button form="edit-doctor-form" type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Guardar cambios
                </button>
            </div>
        </div>

        <form id="edit-doctor-form" action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                    <select name="especialidad"
                        class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty }}" {{ $doctor->especialidad == $specialty ? 'selected' : '' }}>
                                {{ $specialty }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Número de licencia médica</label>
                    <input type="text" name="numero_licencia_medica"
                        value="{{ old('numero_licencia_medica', $doctor->numero_licencia_medica) }}"
                        class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Biografía</label>
                    <textarea name="biografia" rows="4"
                        class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('biografia', $doctor->biografia) }}</textarea>
                </div>

            </div>
        </form>
    </x-card>
</x-admin-layout>
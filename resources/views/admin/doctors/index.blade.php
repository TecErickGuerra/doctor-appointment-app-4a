<x-admin-layout title="Doctores | Healthify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),    
    ],
    [
        'name' => 'Doctores',
    ],
]">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.doctors.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Agregar doctor
        </a>
    </div>

    @livewire('admin.data-tables.doctor-table')
</x-admin-layout>
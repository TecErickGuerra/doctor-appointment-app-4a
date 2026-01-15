<x-admin-layout title="Roles | Healthify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles'
    ],
]">
    {{-- Botón Nuevo en la esquina superior derecha --}}
    <x-slot name="action">
        <a href="{{ route('admin.roles.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
            <i class="fa-solid fa-plus mr-2"></i>
            Nuevo
        </a>
    </x-slot>

    {{-- Componente Livewire Table --}}
    <div class="py-6">
        @livewire('admin.data-tables.role-table')
    </div>
</x-admin-layout>

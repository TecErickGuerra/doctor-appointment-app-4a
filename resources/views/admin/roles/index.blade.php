<x-admin-layout title="Roles | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles'
    ],
]">
    <x-slot name="action">
        <a href="{{ route('admin.roles.create') }}" 
           class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition-colors duration-200">
            <i class="fas fa-plus"></i>
            <span>Nuevo</span>
        </a>
    </x-slot>

    {{-- Componente Livewire Table --}}
    <div class="py-6">
        @livewire('admin-datatables-role-table')
    </div>
</x-admin-layout>
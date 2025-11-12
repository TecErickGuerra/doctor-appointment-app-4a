<x-admin-layout title="Usuarios | Healthify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Usuarios'
    ],
]">

    {{-- Botón Nuevo en la esquina superior derecha --}}
    <x-slot name="action">
        <a href="{{ route('admin.usuarios.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
            <i class="fa-solid fa-plus mr-2"></i>
            Nuevo
        </a>
    </x-slot>

    {{-- Contenido temporal mientras se configura la tabla --}}
    <div class="py-10">
        <div class="bg-white rounded-xl shadow p-8 text-center text-gray-600">
            <p class="text-lg">Aquí se mostrará la tabla de usuarios próximamente.</p>
        </div>
    </div>

</x-admin-layout>

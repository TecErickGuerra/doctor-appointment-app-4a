<x-admin-layout :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        ['name' => 'Profile'],
    ]">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="text-2xl font-semibold mb-4">Panel Administrativo</h1>
            <p class="text-lg mb-6">Hola desde admin</p>
            <!-- Resto del contenido -->
        </div>
    </div>
</x-admin-layout>
<x-admin-layout title="Roles | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles'
    ],
]">
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <!-- Título -->
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Roles</h1>

            <!-- Barra de búsqueda y filtros -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <input type="text" 
                           placeholder="Buscar" 
                           class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center space-x-6">
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-32">
                        <option>Columnas</option>
                    </select>
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-20">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>
            </div>

            <!-- Tabla -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-20">
                                ID
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NOMBRE
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">
                                FECHA
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($roles as $role)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 text-center w-20">
                                {{ $role['id'] }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $role['name'] }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center w-32">
                                {{ $role['created_at'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="px-6 py-4 text-sm text-gray-500">
                    Mostrando {{ count($roles) }} resultados
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
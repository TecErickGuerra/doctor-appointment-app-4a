<x-admin-layout title="Editar Rol | Healthify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),    
    ],
    [
        'name' => 'Roles',
        'href' => route('admin.roles.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">
    <div class="py-6">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Editar Rol</h2>
                
                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- Campo Nombre --}}
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nombre del Rol <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name', $role->name) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="flex items-center justify-between">
                        <button type="button" 
                                onclick="if(confirm('¿Estás seguro de eliminar este rol?')) document.getElementById('delete-form').submit();"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                            <i class="fa-solid fa-trash mr-2"></i>
                            Eliminar
                        </button>
                        
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.roles.index') }}" 
                               class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition">
                                <i class="fa-solid fa-save mr-2"></i>
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Formulario de eliminación oculto --}}
                <form id="delete-form" action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    @if (session('swal'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '{{ session('swal.icon') }}',
            title: '{{ session('swal.title') }}',
            text: '{{ session('swal.text') }}',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3085d6'
        });
    </script>
    @endif

</x-admin-layout>
<div class="flex items-center justify-center space-x-2">
    {{-- Botón de Editar (Azul) --}}
    <a href="{{ route('admin.roles.edit', $role) }}" 
       class="inline-flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded transition-colors duration-200"
       title="Editar rol">
        <i class="fa-solid fa-pen-to-square text-sm"></i>
    </a>

    {{-- Botón de Eliminar (Rojo) --}}
    <form action="{{ route('admin.roles.destroy', $role) }}" 
          method="POST" 
          class="inline"
          onsubmit="return confirm('¿Estás seguro de eliminar el rol {{ $role->name }}?');">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="inline-flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded transition-colors duration-200"
                title="Eliminar rol">
            <i class="fa-solid fa-trash text-sm"></i>
        </button>
    </form>
</div>
<div class="flex items-center justify-center space-x-2">
    {{-- Botón de Editar (Azul) --}}
    <a href="{{ route('admin.doctors.edit', $doctor) }}" 
       class="inline-flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded transition-colors duration-200"
       title="Editar doctor">
        <i class="fa-solid fa-pen-to-square text-sm"></i>
    </a>

    {{-- Botón de Eliminar (Rojo) --}}
    <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
        onsubmit="return confirm('¿Estás seguro de eliminar este doctor?')">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="inline-flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded transition-colors duration-200"
            title="Eliminar doctor">
            <i class="fa-solid fa-trash text-sm"></i>
        </button>
    </form>
</div>
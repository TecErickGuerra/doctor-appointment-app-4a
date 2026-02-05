<div class="flex items-center justify-center space-x-2">
    {{-- Botón de Editar (Azul) --}}
    <a href="{{ route('admin.patients.edit', $patient) }}" 
       class="inline-flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded transition-colors duration-200"
       title="Editar rol">
        <i class="fa-solid fa-pen-to-square text-sm"></i>
    </a>
</div>
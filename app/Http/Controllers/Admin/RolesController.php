<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Muestra la lista de roles
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Muestra el formulario para crear un nuevo rol
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Guarda un nuevo rol en la base de datos
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ], [
            'name.required' => 'El nombre del rol es obligatorio.',
            'name.unique' => 'Este rol ya existe.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Muestra un rol específico (opcional)
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Muestra el formulario para editar un rol
     */
    public function edit(Role $role)
    {
        // 🔒 Evitar que se editen los primeros 4 roles
        if ($role->id <= 4) {
            return redirect()
                ->route('admin.roles.index')
                ->with('error', 'No tienes permiso para editar este rol protegido.');
        }

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Actualiza un rol en la base de datos
     */
    public function update(Request $request, Role $role)
    {
        // Evitar edición de roles protegidos
        if ($role->id <= 4) {
            return redirect()
                ->route('admin.roles.index')
                ->with('error', 'Este rol está protegido y no puede ser modificado.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ], [
            'name.required' => 'El nombre del rol es obligatorio.',
            'name.unique' => 'Este rol ya existe.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        ]);

        // Si el nombre no cambió, mostrar mensaje
        if ($role->name === $request->name) {
            session()->flash('swal', [
                'icon' => 'info',
                'title' => 'Sin cambios',
                'text' => 'No se detectaron cambios.',
            ]);
            return redirect()->route('admin.roles.edit', $role);
        }

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Elimina un rol de la base de datos
     */
    public function destroy(Role $role)
    {
        // Evitar eliminación de roles protegidos
        if ($role->id <= 4) {
            return redirect()
                ->route('admin.roles.index')
                ->with('error', 'Este rol está protegido y no puede eliminarse.');
        }

        try {
            $usersWithRole = \App\Models\User::role($role->name)->count();
        
            if ($usersWithRole > 0) {
                return redirect()
                    ->route('admin.roles.index')
                    ->with('error', 'No se puede eliminar el rol porque tiene ' . $usersWithRole . ' usuario(s) asignado(s).');
            }

            $role->delete();

            return redirect()
                ->route('admin.roles.index')
                ->with('success', 'Rol eliminado exitosamente.');
            
        } catch (\Exception $e) {
            return redirect()
              ->route('admin.roles.index')
              ->with('error', 'Error al eliminar el rol: ' . $e->getMessage());
        }
    }
}

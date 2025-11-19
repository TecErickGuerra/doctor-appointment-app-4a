<?php

namespace App\Livewire\Admin\DataTables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends DataTableComponent
{
    // Define el modelo y su consulta
    public function builder(): Builder
    {
        // Si usas relación "roles" (muchos a muchos)
        return User::query()->with('roles');
        
        // O si usas relación "role" (uno a muchos)
        // return User::query()->with('role');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc'); // Opcional: ordenar por defecto
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),

            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),

            Column::make("Email", "email")
                ->sortable()
                ->searchable(),

            Column::make("Número de id", "id_number")
                ->sortable()
                ->searchable(),

            Column::make("Teléfono", "phone")
                ->sortable()
                ->searchable(),

            Column::make("Rol", "roles.name") //
                ->sortable()
                ->searchable()
                ->label(function($row) {
                    // Si es relación muchos a muchos
                    return $row->roles->first()?->name ?? 'Sin Rol';
                    
                    // Si es relación uno a muchos
                    // return $row->role?->name ?? 'Sin Rol';
                }),

            Column::make("Acciones")
                ->label(function($row) {
                    return view('admin.users.actions', ['user' => $row]);
                })
                ->unclickable()
        ];
    }
}
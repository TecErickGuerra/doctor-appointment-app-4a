<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;

class PatientTable extends DataTableComponent
{
    //protected $model = Patient::class;

    // Define el modelo y su consulta
    public function builder(): Builder
    {
        // Si usas relación "roles" (muchos a muchos)
        return Patient::query()->with('user');
        
        // O si usas relación "role" (uno a muchos)
        // return User::query()->with('role');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "user.name")
                ->sortable(),
            Column::make("Email", "user.email")
                ->sortable(),
            Column::make("Número de id", "user.id_number")
                ->sortable(),
            Column::make("Teléfono", "user.phone")
                ->sortable(),
            Column::make("Acciones")
                ->label(function($row) {
                    return view('admin.patients.actions',
                    ['patient' => $row]);
                })
        ];
    }
}

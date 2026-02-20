<?php

namespace App\Livewire\Admin\DataTables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;

class DoctorTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Doctor::query(); // sin ->with('user')
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
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make("Apellido", "apellido")
                ->sortable(),
            Column::make("Especialidad", "especialidad")
                ->sortable(),
            Column::make("Licencia", "numero_licencia_medica")
                ->sortable(),
            Column::make("Acciones")
                ->label(function($row) {
                    return view('admin.doctors.actions', ['doctor' => $row]);
                })
        ];
    }
}

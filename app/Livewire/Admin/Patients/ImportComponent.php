<?php

namespace App\Livewire\Admin\Patients;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Jobs\ImportPatientsJob;

class ImportComponent extends Component
{
    use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:csv,xlsx,xls|max:10240', // 10MB Max
        ]);

        // Store file locally in the 'imports' directory
        $filePath = $this->file->store('imports', 'local');

        // Dispatch the background job
        ImportPatientsJob::dispatch($filePath);

        $this->reset('file');
        
        session()->flash('message', '🌟 El archivo se está procesando en segundo plano exitosamente. Dependiendo del tamaño, esto puede tomar unos minutos.');
    }

    public function render()
    {
        // Use the standard App layout (check if the project uses 'layouts.app' or 'layouts.admin')
        return view('livewire.admin.patients.import-component')->layout('layouts.app');
    }
}

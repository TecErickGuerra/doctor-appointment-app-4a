<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Appointment;

class ConsultationManager extends Component
{
    public Appointment $appointment;
    
    public $activeTab = 'consulta';
    
    // Form fields
    public $diagnosis = '';
    public $treatment = '';
    public $notes = '';
    public $medications = [];
    
    public $showHistoryModal = false;

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->medications = [
            ['name' => '', 'dosage' => '', 'frequency' => '']
        ];
    }

    public function addMedication()
    {
        $this->medications[] = ['name' => '', 'dosage' => '', 'frequency' => ''];
    }

    public function removeMedication($index)
    {
        unset($this->medications[$index]);
        $this->medications = array_values($this->medications);
    }

    public function saveConsultation()
    {
        $this->validate([
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Logic to save the consultation details would go here
        // E.g. $this->appointment->update(['diagnosis' => $this->diagnosis, 'status' => 2]);

        $this->appointment->update(['status' => 2]); // Mark appointment as complete

        session()->flash('success', 'Consulta guardada y completada exitosamente.');
        return redirect()->route('admin.appointments.index');
    }

    public function render()
    {
        $previousConsultations = $this->appointment->patient->appointments()
            ->where('id', '!=', $this->appointment->id)
            ->where('status', 2) // only completed consultations
            ->orderBy('date', 'desc')
            ->get();

        return view('livewire.admin.consultation-manager', [
            'previousConsultations' => $previousConsultations
        ])->layout('layouts.app'); // Uses the standard Livewire layout or needs to extend Admin layout.
    }
}

<?php

namespace App\Observers;

use App\Models\Appointment;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     */
    public function created(Appointment $appointment): void
    {
        $emails = [];

        // Email del paciente (vía User)
        if ($appointment->patient && $appointment->patient->user && $appointment->patient->user->email) {
            $emails[] = $appointment->patient->user->email;
        }

        // Email del doctor (columna directa o vía User)
        if ($appointment->doctor) {
            if ($appointment->doctor->email) {
                $emails[] = $appointment->doctor->email;
            } elseif ($appointment->doctor->user && $appointment->doctor->user->email) {
                $emails[] = $appointment->doctor->user->email;
            }
        }

        if (!empty($emails)) {
            \Illuminate\Support\Facades\Mail::to($emails)->send(new \App\Mail\AppointmentReceiptMail($appointment));
        }
    }

    /**
     * Handle the Appointment "updated" event.
     */
    public function updated(Appointment $appointment): void
    {
        //
    }

    /**
     * Handle the Appointment "deleted" event.
     */
    public function deleted(Appointment $appointment): void
    {
        //
    }

    /**
     * Handle the Appointment "restored" event.
     */
    public function restored(Appointment $appointment): void
    {
        //
    }

    /**
     * Handle the Appointment "force deleted" event.
     */
    public function forceDeleted(Appointment $appointment): void
    {
        //
    }
}

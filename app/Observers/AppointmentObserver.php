<?php

namespace App\Observers;

use App\Models\Appointment;
use App\Mail\AppointmentReceiptMail;
use Illuminate\Support\Facades\Mail;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     */
    public function created(Appointment $appointment): void
    {
        $patientEmail = $appointment->patient->user->email ?? null;
        $doctorEmail = $appointment->doctor->email ?? ($appointment->doctor->user->email ?? null);

        // Agrupar ambos correos para enviar un solo email a dos destinatarios
        // Esto evita tener que hacer 2 envíos seguidos y saltamos la restricción de Mailtrap
        $recipients = array_filter([$patientEmail, $doctorEmail]);

        if (!empty($recipients)) {
            Mail::to($recipients)->send(new AppointmentReceiptMail($appointment));
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

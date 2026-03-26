<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyDoctorReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;
    public $appointments;

    /**
     * Create a new message instance.
     */
    public function __construct($doctor, $appointments)
    {
        $this->doctor = $doctor;
        $this->appointments = $appointments;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tu Agenda Médica de Hoy - ' . now()->toDateString(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.doctor-report',
        );
    }
}

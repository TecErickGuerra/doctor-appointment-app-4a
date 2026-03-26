<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Mail\DailyAdminReportMail;
use App\Mail\DailyDoctorReportMail;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $today = now()->toDateString();
    $appointmentsToday = Appointment::where('date', $today)->with(['patient.user', 'doctor.user'])->get();

    if ($appointmentsToday->isEmpty()) {
        return;
    }

    // 1. Reporte para el Administrador
    $adminEmail = env('ADMIN_EMAIL', 'admin@hospital.com');
    Mail::to($adminEmail)->send(new DailyAdminReportMail($appointmentsToday));

    // 2. Reportes para cada Doctor
    $appointmentsByDoctor = $appointmentsToday->groupBy('doctor_id');

    foreach ($appointmentsByDoctor as $doctorId => $appointments) {
        $doctor = Doctor::find($doctorId);
        $doctorEmail = $doctor->email ?? ($doctor->user->email ?? null);

        if ($doctorEmail) {
            Mail::to($doctorEmail)->send(new DailyDoctorReportMail($doctor, $appointments));
        }
    }
})->dailyAt('08:00');

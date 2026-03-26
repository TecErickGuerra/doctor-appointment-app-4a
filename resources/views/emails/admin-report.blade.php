@component('mail::message')
# Reporte Diario de Citas

Hola Administrador,

Este es el resumen de todas las citas agendadas para el día de hoy en la clínica:

@component('mail::table')
| Hora | Doctor | Paciente | Motivo |
| :--- | :----- | :------- | :----- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | Dr. {{ $appointment->doctor->nombre ?? '' }} | {{ $appointment->patient->user->name ?? 'N/A' }} | {{ Str::limit($appointment->reason ?? '-', 20) }} |
@endforeach
@endcomponent

Para ver más detalles, por favor ingresa al panel de control.

@component('mail::button', ['url' => config('app.url') . '/admin/appointments'])
Ver Todas las Citas
@endcomponent

Saludos,<br>
El Sistema {{ config('app.name') }}
@endcomponent

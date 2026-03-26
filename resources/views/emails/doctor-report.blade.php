@component('mail::message')
# Tu Agenda Médica de Hoy

Hola Dr. {{ $doctor->nombre ?? '' }} {{ $doctor->apellido ?? '' }},

A continuación, te presentamos tus citas programadas para el día de hoy:

@component('mail::table')
| Hora | Paciente | Motivo |
| :--- | :------- | :----- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ $appointment->patient->user->name ?? 'N/A' }} | {{ Str::limit($appointment->reason ?? 'No especificado', 30) }} |
@endforeach
@endcomponent

Que tengas un excelente día de consulta.

Gracias,<br>
{{ config('app.name') }}
@endcomponent

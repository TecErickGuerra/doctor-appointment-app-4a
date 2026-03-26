<x-mail::message>
# Hola Dr. {{ $doctor->nombre ?? '' }} {{ $doctor->apellido ?? '' }},

Este es el resumen de sus pacientes agendados para hoy, {{ now()->format('d/m/Y') }}:

<x-mail::table>
| Hora | Paciente | Motivo |
| :--- | :------- | :----- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ $appointment->patient->user->name ?? 'N/A' }} | {{ Str::limit($appointment->reason ?? 'No especificado', 30) }} |
@endforeach
</x-mail::table>

¡Que tenga una excelente jornada de consulta!

Gracias,<br>
Sistema {{ config('app.name', 'Healthify') }}
</x-mail::message>

<x-mail::message>
# Hola Dr. {{ $doctor->nombre }},

Este es el resumen de sus pacientes agendados para hoy, {{ now()->format('d/m/Y') }}:

<x-mail::table>
| Hora | Paciente | Motivo |
| :--- | :--- | :--- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ $appointment->patient->user->name }} | {{ Str::limit($appointment->reason, 30) }} |
@endforeach
</x-mail::table>

¡Que tenga una excelente jornada!

Gracias,<br>
Sistema Healthify
</x-mail::message>

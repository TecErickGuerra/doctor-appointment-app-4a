<x-mail::message>
# Hola {{ $appointment->patient->user->name }},

Tu cita médica ha sido agendada con éxito.

**Detalles de la cita:**
- **Doctor:** Dr. {{ $appointment->doctor->nombre }} {{ $appointment->doctor->apellido }}
- **Especialidad:** {{ $appointment->doctor->especialidad }}
- **Fecha:** {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}
- **Hora:** {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

Adjunto encontrarás el comprobante en PDF para tu referencia.

Gracias,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>

<x-mail::message>
# Reporte Diario de Citas - Administrador

Lista de citas programadas para hoy, {{ now()->format('d/m/Y') }}:

<x-mail::table>
| Hora | Paciente | Doctor | Motivo |
| :--- | :--- | :--- | :--- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ $appointment->patient->user->name }} | {{ $appointment->doctor->nombre }} | {{ Str::limit($appointment->reason, 20) }} |
@endforeach
</x-mail::table>

Total de citas para hoy: {{ $appointments->count() }}

Gracias,<br>
Sistema Healthify
</x-mail::message>

<x-mail::message>
# Reporte Diario de Citas - Administrador

Lista de citas programadas para hoy, {{ now()->format('d/m/Y') }}:

<x-mail::table>
| Hora | Paciente | Doctor | Motivo |
| :--- | :------- | :----- | :----- |
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ $appointment->patient->user->name ?? 'N/A' }} | Dr. {{ $appointment->doctor->nombre ?? '' }} | {{ Str::limit($appointment->reason ?? '-', 20) }} |
@endforeach
</x-mail::table>

Total de citas agendadas: {{ $appointments->count() }}

Para ver más detalles o gestionar cancelaciones, por favor ingresa al panel de control.

<x-mail::button :url="config('app.url') . '/admin/appointments'">
Ver Todas las Citas
</x-mail::button>

Gracias,<br>
Sistema {{ config('app.name', 'Healthify') }}
</x-mail::message>

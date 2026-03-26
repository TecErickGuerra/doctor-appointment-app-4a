<div>
    Hola,

    Se ha generado un nuevo <strong>Comprobante de Cita Médica</strong>.

    <ul>
        <li><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</li>
        <li><strong>Hora:</strong> {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</li>
        <li><strong>Paciente:</strong> {{ $appointment->patient->user->name ?? 'N/A' }}</li>
        <li><strong>Doctor:</strong> {{ $appointment->doctor->nombre ?? 'N/A' }} {{ $appointment->doctor->apellido ?? '' }}</li>
    </ul>

    Por favor, encuentra adjunto a este correo el comprobante oficial en formato PDF.

    Gracias,<br>
    El equipo de Healthify
</div>

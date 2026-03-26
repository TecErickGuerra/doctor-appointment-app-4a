<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Cita Médica</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #4a90e2; padding-bottom: 10px; }
        .content { margin-bottom: 20px; }
        .field { font-weight: bold; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #777; }
        .receipt-box { border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Centro Médico Healthify</h1>
        <p>Comprobante de Cita Agendada</p>
    </div>

    <div class="receipt-box">
        <div class="content">
            <p><span class="field">Paciente:</span> {{ $appointment->patient->nombre ?? 'N/A' }} {{ $appointment->patient->apellido ?? '' }}</p>
            <p><span class="field">Doctor:</span> Dr. {{ $appointment->doctor->nombre }} {{ $appointment->doctor->apellido }}</p>
            <p><span class="field">Especialidad:</span> {{ $appointment->doctor->especialidad }}</p>
            <p><span class="field">Fecha:</span> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</p>
            <p><span class="field">Hora:</span> {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</p>
            <p><span class="field">Motivo:</span> {{ $appointment->reason ?? 'Consulta general' }}</p>
        </div>
    </div>

    <div class="footer">
        <p>Este es un comprobante automático. Por favor llegue 15 minutos antes de su cita.</p>
        <p>Generado el {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>

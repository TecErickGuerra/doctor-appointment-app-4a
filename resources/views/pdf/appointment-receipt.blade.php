<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Cita Médica</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.6; padding: 20px;}
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #4a90e2; padding-bottom: 10px; }
        .title { color: #4a90e2; font-size: 24px; font-weight: bold; margin-bottom: 5px; }
        .content { margin-bottom: 20px; }
        .field { font-weight: bold; display: inline-block; width: 120px;}
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #777; }
        .receipt-box { border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Healthify</div>
        <p>Comprobante Oficial de Cita Agendada</p>
    </div>

    <div class="receipt-box">
        <div class="content">
            <p><span class="field">ID de Cita:</span> #{{ str_pad($appointment->id ?? 0, 5, '0', STR_PAD_LEFT) }}</p>
            <p><span class="field">Paciente:</span> {{ $appointment->patient->user->name ?? 'N/A' }}</p>
            <p><span class="field">Doctor:</span> Dr. {{ $appointment->doctor->nombre ?? 'N/A' }} {{ $appointment->doctor->apellido ?? '' }}</p>
            <p><span class="field">Especialidad:</span> {{ $appointment->doctor->especialidad ?? 'Consulta General' }}</p>
            <p><span class="field">Fecha:</span> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</p>
            <p><span class="field">Hora:</span> {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</p>
            <p><span class="field">Motivo:</span> {{ $appointment->reason ?? 'No especificado' }}</p>
        </div>
    </div>

    <div class="footer">
        <p>Este documento es un comprobante automático generado por el sistema Healthify.</p>
        <p>Por favor, preséntese 15 minutos antes de su cita.</p>
        <p>Generado el {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comprobante de Cita</title>
    <style>
        body { font-family: sans-serif; padding: 20px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #4F46E5; padding-bottom: 10px; margin-bottom: 20px; }
        .title { color: #4F46E5; font-size: 24px; font-weight: bold; }
        .details { margin-bottom: 20px; }
        .details th { text-align: left; padding: 8px; background-color: #f3f4f6; }
        .details td { padding: 8px; border-bottom: 1px solid #e5e7eb; }
        .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #6b7280; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Healthify</div>
        <p>Comprobante Oficial de Cita Médica</p>
    </div>

    <div class="details">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="width: 30%;">ID de Cita:</th>
                <td>#{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <th>Paciente:</th>
                <td>{{ $appointment->patient->user->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Doctor:</th>
                <td>{{ $appointment->doctor->nombre ?? '' }} {{ $appointment->doctor->apellido ?? '' }}</td>
            </tr>
            <tr>
                <th>Fecha:</th>
                <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Horario:</th>
                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }}</td>
            </tr>
            <tr>
                <th>Motivo:</th>
                <td>{{ $appointment->reason ?? 'No especificado' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Este documento es un comprobante generado automáticamente por el sistema Healthify.</p>
        <p>Por favor, preséntese 10 minutos antes de su cita.</p>
    </div>
</body>
</html>

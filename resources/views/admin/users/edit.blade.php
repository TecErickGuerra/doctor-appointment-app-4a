<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario | Healthify</title>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial, sans-serif;">
        <div style="text-align: center;">
            <h1>Página de Edición</h1>
            <p>Formulario de edición para el usuario ID: {{ $user->id }}</p>
            <p>Esta página está intencionalmente en blanco.</p>
            <a href="{{ route('admin.usuarios.index') }}" style="color: blue; text-decoration: underline;">
                ← Volver a la lista
            </a>
        </div>
    </div>
</body>
</html>
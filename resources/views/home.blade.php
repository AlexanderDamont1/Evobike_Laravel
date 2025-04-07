<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Gestión de Piezas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f8ff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .welcome-container {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h1 {
            font-size: 2.5rem;
            color:rgb(0, 148, 7);
        }

        p {
            font-size: 1.2rem;
            color: #555;
        }

        .btn {
            background-color:rgb(3, 141, 10);
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .message {
            font-size: 1.5rem;
            color: #28a745;
            margin-top: 20px;
        }

        .action-buttons {
            margin-top: 20px;
        }

        .action-buttons a {
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <div class="welcome-container">
        <h1>¡Bienvenido a EvoBike!</h1>
        <p>Desde aquí podrás gestionar las piezas de tu inventario de manera rápida y sencilla.</p>

        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        <div class="action-buttons">
            <a href="{{ route('piezas.index') }}" class="btn">Ver Piezas</a>
            <a href="{{ route('piezas.create') }}" class="btn">Registrar Pieza</a>
        </div>
    </div>

</body>
</html>
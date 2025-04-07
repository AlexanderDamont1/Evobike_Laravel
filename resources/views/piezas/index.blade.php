<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Piezas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Estilos ya existentes */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 0;
            margin: 0;
        }

        header {
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .alert {
            margin-bottom: 20px;
            color: green;
            font-weight: bold;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #34495e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        button {
            padding: 8px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .alerta {
            background-color: #f8d7da;
            color: #721c24;
            font-weight: bold;
        }

        .disponible {
            background-color: #d4edda;
            color: #155724;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    <h1>Gestión de Inventario - EVOBIKE</h1>
</header>

<div class="container">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('home') }}">
        <button>Volver al inicio</button>
    </a>

    <a href="{{ route('piezas.create') }}">
        <button>Registrar Nueva Pieza</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($piezas as $pieza)
                <tr>
                    <td>{{ $pieza->nombre }}</td>
                    <td>{{ $pieza->codigo }}</td>
                    <td>{{ $pieza->cantidad }}</td>
                    <td class="{{ $pieza->cantidad <= $pieza->limite_alerta ? 'alerta' : 'disponible' }}">
                        {{ $pieza->cantidad <= $pieza->limite_alerta ? '🔴 En alerta' : '🟢 Disponible' }}
                    </td>
                    <td>
                        <a href="{{ route('piezas.edit', $pieza->id) }}">
                            <button>Editar</button>
                        </a>
                        <form action="{{ route('piezas.destroy', $pieza->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('¿Estás seguro de eliminar esta pieza?')">Eliminar</button>
                        </form>
                        <!-- Botón para registrar el uso de la pieza -->
                        <a href="{{ route('usos.create', ['pieza_id' => $pieza->id]) }}">
                            <button>Registrar Uso</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
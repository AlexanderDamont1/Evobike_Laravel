<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Piezas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    <h1>Gestión de Inventario - EVOBIKE</h1>
</header>

<div class="container">
    <div class="alert">
        <p>{{ session('success') }}</p>
    </div>

    <a href="{{ route('home') }}">
        <button>Volver al inicio</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($piezas as $pieza)
                <tr>
                    <td>{{ $pieza->nombre }}</td>
                    <td>{{ $pieza->codigo }}</td>
                    <td>{{ $pieza->cantidad }}</td>
                    <td>
                        <a href="{{ route('piezas.edit', $pieza->id) }}">
                            <button>Editar</button>
                        </a>
                        <form action="{{ route('piezas.destroy', $pieza->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #e74c3c;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
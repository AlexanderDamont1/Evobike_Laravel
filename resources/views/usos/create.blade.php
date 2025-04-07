<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Uso de Pieza</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    <h1>Registrar Uso de Pieza - EVOBIKE</h1>
</header>

<div class="container">
    @if(session('success'))
        <div class="alert success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('usos.store') }}" method="POST">
        @csrf

        <label for="pieza_id">Seleccionar Pieza</label>
        <select name="pieza_id" id="pieza_id" required>
            <option value="">-- Elige una Pieza --</option>
            @foreach ($piezas as $pieza)
                <option value="{{ $pieza->id }}">{{ $pieza->nombre }} ({{ $pieza->codigo }})</option>
            @endforeach
        </select>

        <label for="cantidad_utilizada">Cantidad Utilizada</label>
        <input type="number" name="cantidad_utilizada" id="cantidad_utilizada" required min="1">

        <button type="submit">Registrar Uso</button>
    </form>

    <a href="{{ route('home') }}">
        <button>Volver al inicio</button>
    </a>
</div>

</body>
</html>

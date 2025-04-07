<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pieza</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    <h1>Registrar Pieza - EVOBIKE</h1>
</header>

<div class="container">
    <form action="{{ route('piezas.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>

        <label for="codigo">Código</label>
        <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" required min="0">

        <label for="limite_alerta">Cantidad mínima para alerta</label>
        <input type="number" name="limite_alerta" id="limite_alerta" value="{{ old('limite_alerta', 5) }}" required min="0">

        <button type="submit">Registrar Pieza</button>
    </form>

    <a href="{{ route('home') }}">
        <button>Volver al inicio</button>
    </a>
</div>

</body>
</html>

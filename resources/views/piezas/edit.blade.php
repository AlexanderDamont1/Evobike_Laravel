<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pieza</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            color: #333;
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

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="number"], textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        button {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    <h1>Editar Pieza - EVOBIKE</h1>
</header>

<div class="container">
    <form action="{{ route('piezas.update', $pieza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $pieza->nombre) }}" required>

        <label for="codigo">Código</label>
        <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $pieza->codigo) }}" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion">{{ old('descripcion', $pieza->descripcion) }}</textarea>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $pieza->cantidad) }}" required min="0">

        <label for="limite_alerta">Cantidad mínima para alerta</label>
        <input type="number" name="limite_alerta" id="limite_alerta" value="{{ old('limite_alerta', $pieza->limite_alerta) }}" required min="0">

        <button type="submit">Actualizar Pieza</button>
    </form>

    <a href="{{ route('home') }}">
        <button>Volver al inicio</button>
    </a>
</div>

</body>
</html>

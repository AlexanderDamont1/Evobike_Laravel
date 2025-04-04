<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Inventario')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Sistema de Inventario</h1>
    </header>

    <nav>
        <ul>
            <li><a href="{{ route('productos.index') }}">Ver Inventario</a></li>
            <li><a href="{{ route('productos.create') }}">Registrar Producto</a></li>
            <li><a href="#">Modificar Producto</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Inventario</p>
    </footer>
</body>
</html>

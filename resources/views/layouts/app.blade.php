<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - Mi Proyecto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <h1>Jorge Suarez Romero</h1>
        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('sobre-mi') }}">Sobre mí</a>
            <a href="{{ route('materias') }}">Materias</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>Jorge Suarez Romero - 2026</p>
    </footer>

</body>
</html>
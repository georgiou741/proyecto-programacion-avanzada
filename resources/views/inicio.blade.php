@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')

<section class="tarjeta-principal">
    <h2>Bienvenid@s, internautas!</h2>

    <p>
        Este es mi portafolio academico — SIS-500.
    </p>

    <div class="datos-inicio">
        <div class="dato">
            <strong>Nombre:</strong>
            <span>{{ $nombre }}</span>
        </div>

        <div class="dato">
            <strong>Carrera:</strong>
            <span>{{ $carrera }}</span>
        </div>

        <div class="dato">
            <strong>Semestre:</strong>
            <span>{{ $semestre }}</span>
        </div>

        <div class="dato">
            <strong>Año:</strong>
            <span>{{ $año }}</span>
        </div>
    </div>
</section>

@endsection
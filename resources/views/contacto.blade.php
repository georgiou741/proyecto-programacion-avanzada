@extends('layouts.app')

@section('titulo', 'Contacto')

@section('contenido')

<section class="tarjeta-principal">
    <h2>Contacto</h2>
    <p>Escríbeme</p>

    @if(isset($confirmacion))
        <div class="mensaje-confirmacion" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            <strong>{{ $confirmacion }}</strong>
            <p style="margin-top: 10px;"><strong>Nombre:</strong> {{ $nombreRecibido }}</p>
            <p><strong>Correo:</strong> {{ $emailRecibido }}</p>
            <p><strong>Mensaje:</strong> {{ $mensajeRecibido }}</p>
        </div>
    @endif

    <form action="{{ route('contacto.procesar') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" placeholder="Tu correo" required>

        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Tu mensaje aquí..." required></textarea>

        <button type="submit">Enviar</button>
    </form>
</section>

@endsection
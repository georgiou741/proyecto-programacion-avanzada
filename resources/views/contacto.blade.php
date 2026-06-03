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
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
        @enderror

        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" placeholder="Tu correo" value="{{ old('correo') }}" required>
        @error('correo')
            <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
        @enderror

        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>
        @error('mensaje')
            <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
        @enderror

        <button type="submit">Enviar</button>
    </form>
</section>

@endsection
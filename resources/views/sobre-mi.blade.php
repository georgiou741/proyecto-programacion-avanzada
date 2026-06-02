@extends('layouts.app')

@section('titulo', 'Sobre mí')

@section('contenido')

<section class="tarjeta-principal">
    <h2>Sobre mí</h2>

    <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 30px;" class="perfil-contenido">
        <img src="{{ asset('imagenes/mi.jpg') }}" alt="Jorge" style="border-radius: 50%; object-fit: cover;" width="100" height="100">
        
        <div class="info-personal">
            <p><strong>Nombre:</strong> {{ $nombre }}</p>
            <p><strong>Carrera:</strong> {{ $carrera }}</p>
            <p><strong>Semestre:</strong> {{ $semestre }}</p>
            <p style="color: #e74c3c; margin-top: 10px;"><strong><em>"{{ $frase }}"</em></strong></p>
        </div>
    </div>

    <h3>Mis habilidades</h3>

    <div class="habilidades" style="margin-top: 20px;">
        @foreach($habilidades as $habilidad)
            <div class="habilidad" style="margin-bottom: 15px;">
                <div class="habilidad-info" style="display: flex; justify-content: space-between; font-weight: bold;">
                    <span>{{ $habilidad }}</span>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
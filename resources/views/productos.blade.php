@extends('layouts.app') 

@section('titulo', 'Productos')

@section('contenido')

<section class="tarjeta-principal">
    
    <h2><em>Lista de Productos</em></h2>

    <p>Detalle del producto</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ $producto['categoria'] }}</td>
                    
                    <td>{{ number_format($producto['precio'], 2) }} Bs. </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <div class="resumen-materias" style="margin-top: 25px;">
        <div class="resumen-caja" style="max-width: 300px; border-left: 4px solid var(--color-acento);">
            <strong>Precio promedio</strong>
            
            <span>{{ number_format($precioPromedio, 2) }} Bs. </span>
        </div>
    </div>
</section>

@endsection
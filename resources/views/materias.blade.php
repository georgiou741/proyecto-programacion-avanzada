@extends('layouts.app')

@section('titulo', 'Materias')

@section('contenido')

<section class="tarjeta-principal">
    <h2>Mis materias</h2>

    <p>En esta sección se muestra el listado académico actualizado del semestre vigente:</p>

    <div class="resumen-materias">
        <div class="resumen-caja">
            <strong>Promedio general</strong>
            <span>{{ $promedio }}</span>
        </div>
        <div class="resumen-caja">
            <strong>Materias aprobadas</strong>
            <span>{{ $aprobadas }}</span>
        </div>
        <div class="resumen-caja">
            <strong>Total materias</strong>
            <span>{{ count($materias) }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Materia</th>
                <th>Créditos</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
                <tr>
                    <td>{{ $materia->getCodigo() }}</td>
                    <td>{{ $materia->getNombre() }}</td>
                    <td>{{ $materia->getCreditos() }}</td>
                    <td>{{ $materia->getNotaFormatted() }}</td>
                    <td>
                        <span style="background-color: {{ $materia->getColorEstado() }}; color: #2c3e50; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em; display: inline-block;">
                            {{ $materia->getEstado() }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection
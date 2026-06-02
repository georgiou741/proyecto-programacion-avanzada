<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class PaginaController extends Controller
{
    public function inicio()
    {
        return view('inicio', [
            'nombre' => 'Jorge Mauricio Suarez Romero',
            'carrera' => 'Ingeniería de Sistemas',
            'semestre' => 'Quinto semestre',
            'anio' => date('Y'),
        ]);
    }

    public function sobreMi()
    {
        // Tus 5 habilidades extraídas del HTML con porcentajes para el diseño de barras
        $habilidades = [
            'Tocar el bajo eléctrico',
            'Mantenimiento de servidores',
            'Cuidador de personas con discapacidad severa',
            'Traductor inglés - español',
            'Actor mimo',
        ];

        return view('sobre-mi', [
            'nombre' => 'Jorge Mauricio Suarez Romero',
            'carrera' => 'Ingeniería de Sistemas',
            'semestre' => 'Quinto semestre',
            'frase' => 'It is preferable not to travel with a dead man.',
            'habilidades' => $habilidades,
        ]);
    }

    public function materias()
    {
        // Las 5 materias exactas de tu archivo HTML
        $materias = [
            new Materia('Física aplicada', 'FIS-100', 5, 51.0),
            new Materia('Desarrollo sostenible', 'DES-200', 5, 87.0),
            new Materia('Ciencia de datos y big data', 'BIG-300', 5, 69.0),
            new Materia('Base de datos II', 'SIS-480', 5, 47.0),
            new Materia('Práctica profesional III', 'PRA-500', 5, null), // Materia pendiente (null)
        ];

        // Filtramos las materias que tienen nota para calcular el promedio real
        $materiasConNota = array_filter($materias, fn(Materia $m) => !is_null($m->getNota()));
        $notas = array_map(fn(Materia $m) => $m->getNota(), $materiasConNota);
        
        $promedio  = count($notas) > 0 ? round(array_sum($notas) / count($notas), 2) : 0;
        $aprobadas = count(array_filter($materias, fn(Materia $m) => $m->estaAprobada()));

        return view('materias', compact('materias', 'promedio', 'aprobadas'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function procesarContacto(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|min:3',
            'correo'   => 'required|email', // Vinculado al name="correo" de tu formulario HTML
            'mensaje' => 'required',
        ]);

        return view('contacto', [
            'confirmacion' => '¡Mensaje enviado con éxito!',
            'nombreRecibido' => $validated['nombre'],
            'emailRecibido' => $validated['correo'],
            'mensajeRecibido' => $validated['mensaje'],
        ]);
    }
}
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
            'año' => date('Y'),
        ]);
    }

    public function sobreMi()
    {
        // Tus 5 habilidades extraídas del HTML con porcentajes para el diseño de barras
        $habilidades = [
            'Tocar el bajo eléctrico',
            'Mantenimiento de servidores',
            'Asistente de personas con discapacidad severa',
            'Traductor inglés - español',
            'Lenguaje de programación C++',
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
 // ANTES (Parte 2): instanciaba objetos manualmente con new Materia(...)
 // AHORA (Parte 3): Eloquent recupera todos los registros de la tabla 'materias'
 // La interfaz pública de Materia es IDÉNTICA — la vista no necesita cambios.
        $materias = Materia::all();
 // avg() devuelve null si la colección está vacía → ?? 0 evita el error.
        $promedio = round($materias->avg(fn(Materia $m) => $m->getNota()) ?? 0, 2);
        $aprobadas = $materias->filter(fn(Materia $m) => $m->estaAprobada())->count();
 
        return view('materias', compact('materias', 'promedio', 'aprobadas'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function procesarContacto(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|min:3|max:100',
            'correo'   => 'required|email', // Vinculado al name="correo" del formulario HTML
            'mensaje' => 'required|min:10',
        ]);

        return view('contacto', [
            'confirmacion' => '¡Mensaje enviado con éxito!',
            'nombreRecibido' => $validated['nombre'],
            'emailRecibido' => $validated['correo'],
            'mensajeRecibido' => $validated['mensaje'],
        ]);
    }
}
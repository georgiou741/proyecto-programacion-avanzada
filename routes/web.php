<?php

use Illuminate\Support\Facades\Route;
// Importamos el controlador
use App\Http\Controllers\PaginaController;

use App\Http\Controllers\ProductoController;

Route::get('/', function () {
 return view('welcome', [
 'nombre' => 'Tu Nombre Completo',
 'carrera' => 'Ingeniería de Sistemas',
 'semestre' => 'Sexto semestre',
 'año' => date('Y'),
 ]);
});

// 1. Ruta de Inicio
Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');

// 2. Ruta Sobre Mí
Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');

// 3. Ruta Materias
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');

// 4. Ruta Contacto (GET)
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');

// 5. Ruta Contacto (POST)
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
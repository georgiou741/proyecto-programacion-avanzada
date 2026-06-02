<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos=[
            ['nombre' => 'Laptop HP', 'precio' => 4500.00, 'categoria' => 'Electrónica'],
            ['nombre' => 'Mouse inalámbrico', 'precio' => 150.50, 'categoria' => 'Accesorios'],
            ['nombre' => 'Teclado analógico', 'precio' => 380.00, 'categoria' => 'Accesorios'],
            ['nombre' => 'Pantalla de 24"', 'precio' => 1200.00, 'categoria' => 'Electrónica'],
            ['nombre' => 'Impresora', 'precio' => 1850.00, 'categoria' => 'Oficina'],
        ];

        $precios = array_column($productos, 'precio');
        $precioPromedio = array_sum($precios) / count($precios);

        return view('productos', compact('productos', 'precioPromedio'));
    }
}
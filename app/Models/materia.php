<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    // 1. Definimos las columnas de la BD que se pueden rellenar masivamente desde el Seeder
    protected $fillable = ['nombre', 'codigo', 'creditos', 'nota_obtenida'];

    // 2. Desactivamos los timestamps si tu tabla de la BD no tiene 'created_at' y 'updated_at'
    // (Si tu migración los incluye, puedes borrar o comentar la siguiente línea)
    public $timestamps = false;

    // --------------------------------------------------------------------------
    // Getters — Ahora acceden directamente a las columnas de la Base de Datos
    // --------------------------------------------------------------------------
    
    public function getNombre(): string { return $this->nombre; }
    
    public function getCodigo(): string { return $this->codigo; }
    
    public function getCreditos(): int  { return $this->creditos; }
    
    public function getNota(): ?float  { return $this->nota_obtenida; }

    public function getNotaFormatted(): string 
    { 
        return $this->nota_obtenida ?? ' - '; 
    }

    public function estaAprobada(): bool 
    { 
        return $this->nota_obtenida !== null && $this->nota_obtenida >= 51; 
    }

    public function getEstado(): string
    {
        if ($this->nota_obtenida === null) return 'Pendiente';
        if ($this->nota_obtenida >= 86) return 'Excelente';
        if ($this->nota_obtenida >= 71) return 'Bueno';
        if ($this->nota_obtenida >= 51) return 'Aprobado';
        return 'Reprobado';
    }

    public function getColorEstado(): string
    {
        return match (true) {
            $this->nota_obtenida === null => '#e2e8f0', // Gris claro
            $this->nota_obtenida >= 86    => '#d4edda', // Verde claro
            $this->nota_obtenida >= 71    => '#d1ecf1', // Azul claro
            $this->nota_obtenida >= 51    => '#fff3cd', // Amarillo claro
            default                      => '#f8d7da', // Rojo claro
        };
    }
}
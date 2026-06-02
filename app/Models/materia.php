<?php

namespace App\Models;

class Materia 
{
    private string $nombre;
    private string $codigo;
    private int $creditos;
    private ?float $notaObtenida; // El signo ? permite valores nulos (para materias pendientes)

    public function __construct(string $nombre, string $codigo, int $creditos, ?float $nota) 
    {
        $this->nombre       = $nombre;
        $this->codigo       = $codigo;
        $this->creditos     = $creditos;
        $this->notaObtenida = $nota;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCodigo(): string { return $this->codigo; }
    public function getCreditos(): int  { return $this->creditos; }
    
    // Si la nota es nula devuelve un guion, de lo contrario la nota
    public function getNotaFormatted(): string 
    { 
        return is_null($this->notaObtenida) ? ' - ' :($this->notaObtenida); 
    }
    
    public function getNota(): ?float { return $this->notaObtenida; }

    public function estaAprobada(): bool 
    { 
        return !is_null($this->notaObtenida) && $this->notaObtenida >= 51; 
    }

    public function getEstado(): string
    {
        if (is_null($this->notaObtenida)) return 'Pendiente';
        if ($this->notaObtenida >= 86) return 'Excelente';
        if ($this->notaObtenida >= 71) return 'Bueno';
        if ($this->notaObtenida >= 51) return 'Aprobado';
        return 'Reprobado';
    }

    public function getColorEstado(): string
    {
        return match (true) {
            is_null($this->notaObtenida) => '#e2e8f0', // Gris claro para pendiente
            $this->notaObtenida >= 86   => '#d4edda', // Verde claro
            $this->notaObtenida >= 71   => '#d1ecf1', // Azul claro
            $this->notaObtenida >= 51   => '#fff3cd', // Amarillo claro
            default                     => '#f8d7da', // Rojo claro
        };
    }
}
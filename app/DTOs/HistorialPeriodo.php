<?php

namespace App\DTOs;

class HistorialPeriodo
{
    public string $periodo;
    public array $entidades; // Array of HistorialEntidad objects

    public function __construct(array $data)
    {
        $this->periodo = $data['periodo'];
        $this->entidades = array_map(fn($e) => new HistorialEntidad($e), $data['entidades'] ?? []);
    }
}

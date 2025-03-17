<?php

namespace App\DTOs;

class HistorialDeuda
{
    public int $identificacion;
    public ?string $denominacion;
    public array $periodos; // Array of HistorialPeriodo objects

    public function __construct(array $data)
    {
        $this->identificacion = $data['identificacion'];
        $this->denominacion = $data['denominacion'] ?? null;
        $this->periodos = array_map(fn($p) => new HistorialPeriodo($p), $data['periodos'] ?? []);
    }
}

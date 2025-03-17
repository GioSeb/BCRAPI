<?php

namespace App\DTOs;

class HistorialEntidad
{
    public ?string $entidad;
    public ?int $situacion;
    public ?float $monto;
    public bool $enRevision;
    public bool $procesoJud;

    public function __construct(array $data)
    {
        $this->entidad = $data['entidad'] ?? null;
        $this->situacion = isset($data['situacion']) ? (int) $data['situacion'] : null;
        $this->monto = isset($data['monto']) ? (float) $data['monto'] : null;
        $this->enRevision = (bool) ($data['enRevision'] ?? false);
        $this->procesoJud = (bool) ($data['procesoJud'] ?? false);
    }
}

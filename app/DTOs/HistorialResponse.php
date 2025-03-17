<?php

namespace App\DTOs;

class HistorialResponse
{
    public int $status;
    public HistorialDeuda $results;

    public function __construct(array $data)
    {
        $this->status = $data['status'];
        $this->results = new HistorialDeuda($data['results']);
    }
}

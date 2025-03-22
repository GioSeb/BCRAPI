<?php

namespace App\Helpers;

function organizarPorEntidad($jsonResponse) {
    // Decode JSON to array
    $data = json_decode($jsonResponse, true);

    // Inicializar un array para almacenar la nueva estructura
    $transformedData = [];

    // Iterar sobre los períodos
    foreach ($data['results']['periodos'] as $periodo) {
        $periodoNombre = $periodo['periodo'];

        // Iterar sobre las entidades del período
        foreach ($periodo['entidades'] as $entidad) {
            $entidadNombre = $entidad['entidad'];

            // Si la entidad no existe en el array, inicializarla
            if (!isset($transformedData[$entidadNombre])) {
                $transformedData[$entidadNombre] = [
                    'entidad' => $entidadNombre,
                    'periodos' => []
                ];
            }

            // Añadir el período a la entidad
            $transformedData[$entidadNombre]['periodos'][] = [
                'periodo' => $periodoNombre,
                'situacion' => $entidad['situacion'],
                'monto' => $entidad['monto'],
                'enRevision' => $entidad['enRevision'],
                'procesoJud' => $entidad['procesoJud']
            ];
        }
    }
    // Return the transformed data as an array
    return [
        'status' => 200,
        'results' => [
            'identificacion' => $data['results']['identificacion'],
            'denominacion' => $data['results']['denominacion'],
            'entidades' => array_values($transformedData) // Convertir a array indexado
        ]
    ];
}

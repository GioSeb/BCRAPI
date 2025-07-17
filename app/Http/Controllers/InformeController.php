<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function App\Helpers\organizarPorEntidad;

/* TO DO make call to ddbb to fetch name from cuit */
/* TO DO manage errors better */

class InformeController extends Controller
{
    public function fetchHistorial($cuit)
    {
        // Make API call TO DO resolve the withoutVerifying
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/Historicas/{$cuit}");

        // Check if API call was successful
        if ($response->ok()) {
            // call organizarPorEntidad function to reestructure response
            $historial = organizarPorEntidad($response);
            // return data => historial
            return $historial;
        }

        // Handle errors
        return null;
    }

    public function fetchDeudor($cuit) {
        // API call TO DO resolve the withoutVerifying
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/{$cuit}");

        // check succesfull
        if ($response->ok()) {
            $deudor = $response;
            return $deudor->json();
        }

        // handle errors
        return null;
    }

        /**
     * Fetches the list of financial entities from the API.
     * @return array|null
     */
    private function fetchEntidades()
    {
        // This endpoint is assumed based on the API structure. Please verify it's correct.
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/cheques/v1.0/entidades");

        if ($response->ok()) {
            return $response->json();
        }

        return null;
    }

    // cheques rechazados
        /**
     * Fetches rejected checks and enriches them with entity names.
     * @param string $cuit
     * @return array|null
     */
    public function fetchChequesRechazados($cuit){
        // api call
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/ChequesRechazados/{$cuit}");

        // check succesfull
        if($response->ok()){
            $rechazados = $response->json();
            $entidadesResponse = $this->fetchEntidades();

            // Check if we have both rejected checks and the entities list
            if ($entidadesResponse && isset($entidadesResponse['results'])) {
                // Create a map for quick lookup: codigoEntidad => denominacion
                $entidadesMap = [];
                foreach ($entidadesResponse['results'] as $entidadData) {
                    $entidadesMap[$entidadData['codigoEntidad']] = $entidadData['denominacion'];
                }

                // Add the entity name to the rejected checks data if 'causales' exists
                if (isset($rechazados['results']['causales']) && is_array($rechazados['results']['causales'])) {
                    // Use a reference (&) to modify the array directly
                    foreach ($rechazados['results']['causales'] as &$causal) {
                        if (isset($causal['entidades']) && is_array($causal['entidades'])) {
                             // Use a reference (&) to modify the array directly
                            foreach ($causal['entidades'] as &$entidad) {
                                $entidadId = $entidad['entidad'];
                                // Assign the entity name from our map
                                $entidad['nombreEntidad'] = $entidadesMap[$entidadId] ?? 'Nombre no encontrado';
                            }
                        }
                    }
                }
            }
            return $rechazados;
        }

        // The API returns 404 if there are no rejected checks, which is a valid case.
        // We can return an empty array to signify no results. TO DO que?
        if ($response->status() === 404) {
            return ['results' => [], 'status' => 404, 'errorMessages' => 'No se encontraron cheques rechazados para este CUIT'];
        }

        // For any other error, return null
        return null;
    }

    public function fetchInforme(Request $request) {
        // Validate input
        $request->validate([
            'cuit' => 'required|digits:11', // Ensure CUIT is 11 digits
        ]);

        // Extract CUIT from request
        $cuit = $request->input('cuit');

        // Fetch data from both API calls
        $historial = $this->fetchHistorial($cuit);
        $deudor = $this->fetchDeudor($cuit);
        $rechazados = $this->fetchChequesRechazados(($cuit));

        //return both to the view
        // Check if both API calls returned data
        if ($historial && $deudor && $rechazados) {
            return view('informe', [
                'historial' => $historial,
                'deudor' => $deudor,
                'rechazados' => $rechazados
            ]);
        }
        // If any API call failed, redirect back with a general error message
        return back()->withErrors(['error' => 'No se pudieron obtener los datos de la API. Por favor, intente de nuevo más tarde.']);
    }
}

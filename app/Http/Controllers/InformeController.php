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

    // cheques rechazados
    public function fetchChequesRechazados($cuit){
        // api call
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/ChequesRechazados/{$cuit}");

        // check succesfull
        //TO DO resolve 404 if no check is found
        if($response->ok()){
            $rechazados = $response;
            return $rechazados->json();
        }

        // The API returns 404 if there are no rejected checks, which is a valid case.
        // We can return an empty array to signify no results.
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

/*         dd($historial, $deudor, $rechazados); */

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

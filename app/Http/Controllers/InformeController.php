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
        return back()->withErrors(['error' => 'Falla al traer historial de la API']);
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
        return back()->withErrors(['error' => 'Falla al traer deuda de la API']);
    }

    // cheques rechazados
    public function fetchChequesRechazados($cuit){
        // api call
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/ChequesRechazados/{$cuit}");

        // check succesfull
        /* TO DO resolve 404 if no check is found */
        if($response->ok()){
            $rechazados = $response;
            return $rechazados->json();
        }

        // handle errors
        if ($response->status() === 404) {
            return response()->json(['error' => 'No se encontraron cheques rechazados para este CUIT'], 404);
        }
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

        // Handle errors
        return back()->withErrors(['error' => 'Falla al traer datos de la API']);
    }
}

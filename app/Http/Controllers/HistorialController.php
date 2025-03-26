<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function App\Helpers\organizarPorEntidad;

class HistorialController extends Controller
{
    public function fetchHistorial(Request $request)
    {
        // Validate input
        $request->validate([
            'cuit' => 'required|digits:11', // Ensure CUIT is 11 digits
        ]);

        // Extract CUIT from request
        $cuit = $request->input('cuit');

        // Make API call TO DO resolve the withoutVerifying
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/Historicas/{$cuit}");

        // Check if API call was successful
        if ($response->ok()) {
            // call organizarPorEntidad function to reestructure response
            $transformedData = organizarPorEntidad($response);
            // Pass data to view
            return view('informe', ['data' => $transformedData]);
        }

        // Handle errors
        return back()->withErrors(['error' => 'Falla al traer historial de la API']);
    }
}

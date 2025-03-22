<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function App\Helpers\organizarPorEntidad;

class HistorialController extends Controller
{
    public function fetch(Request $request)
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
            /* print_r($transformedData); */
            // Pass data to view
            return view('historial', ['data' => $transformedData]);
        }

        // Handle errors
        return back()->withErrors(['error' => 'Failed to fetch data from API']);
    }
}

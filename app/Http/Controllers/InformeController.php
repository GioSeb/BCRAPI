<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InformeController extends Controller
{
    public function fetchDeudor(Request $request) {
        // validate
        $request->validate([
            'cuit' => 'required|digits:11',
        ]);

        // extract cuit
        $cuit = $request->input('cuit');

        // API call TO DO resolve the withoutVerifying
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/CentralDeDeudores/v1.0/Deudas/{$cuit}");

        // check succesfull
        if ($response->ok()) {
            return view('informe', ['data' => $response]);
        }

        // handle errors
        return back()->withErrors(['error' => 'Falla al traer deuda de la API']);
    }
}

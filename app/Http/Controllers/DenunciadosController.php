<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SectorChequesController as SectorChequesController;

class DenunciadosController extends Controller
{
    public function fetchDenunciados($entidad, $cheque){
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/cheques/v1.0/denunciados/{$entidad}/{$cheque}");

        if ($response->ok()) {
            $data = $response->json();
            $data['status'] = 200; // Add status for easier handling in the view
            return $data;
        }

        if ($response->status() === 404) {
            return ['status' => 404, 'errorMessages' => 'El cheque no se encuentra denunciado.'];
        }

        return $response->json();
    }


    public function show(Request $request){
        $request->validate([
            'cheque_numero' => 'required | int',
            'entidad' => 'required'
        ]);

        $entidad = $request->input('entidad');
        $cheque = $request->input('cheque_numero');

        $denunciado = $this->fetchDenunciados($entidad, $cheque);
        /* TO DO add error */

        if (isset($denunciado['errorMessages'])) {
            $errorMessage = $denunciado['errorMessages'];
            return back()->withErrors(['error' => $errorMessage]);
        }
        return view('denunciados', [
            'denunciado' => $denunciado,
        ]);
    }
}


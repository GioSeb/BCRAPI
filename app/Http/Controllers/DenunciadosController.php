<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function App\Helpers\organizarPorEntidad;
use App\Models\History;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DenunciadosController extends Controller
{
    public function fetchDenunciados($entidad, $cheque){
        $response = Http::withoutVerifying()->get("api.bcra.gob.ar/cheques/v1.0/denunciados/{$entidad}/{$cheque}");

        if ($response->ok()) {
            $data = $response->json();
            $data['status'] = 200; // Add status for easier handling in the view
            return $data;
        }

        if ($response->status() === 404) {
            return ['status' => 404, 'errorMessages' => 'El cheque no se encuentra denunciado.'];
        }

        return null;
    }


    public function printDenunciado(Request $request){
        $request->validate([
            'cheque' => 'required | int'
        ]);

        $cheque = $request->input('cheque');
        $entidad = $request->input('entidad');

        $denunciado = $this->fetchDenunciados($entidad, $cheque);

        if($bancos && $denunciado){
            $nombresEntidades = $bancos['results']->each(function (){
                return $nombresEntidades['denominacion'];
            });
                # code...
        }

            return view('denunciado', [

            ])
        }
    }
}

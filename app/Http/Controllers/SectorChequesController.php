<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function App\Helpers\organizarPorEntidad;
use App\Models\History;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SectorChequesController extends Controller
{
    public function fetchEntidades(){
        $response = Http::withoutVerifying()->get("https://api.bcra.gob.ar/cheques/v1.0/entidades");

        if ($response->ok()) {
            $data = $response->json();
            $data['status'] = 200;
            return $data;
        }

        if ($response->status() === 400) {
            $response->json();

            return ['status' => 400, $response['errorMessages']['Lo siento, la consulta no pudo realizarse. Intente más tarde.']];
        }
    }

    public function index(){
        $bancos = $this->fetchEntidades();

        if ($bancos){
            return view('sector-cheques', [
                'bancos' => $bancos,
                ]);
        }else{
            return back()->withErrors(['error' => 'No se pudieron obtener los datos de la API. Por favor, intente de nuevo más tarde.']);
        }
    }
}

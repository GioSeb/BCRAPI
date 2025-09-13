<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguimientoController extends Controller
{
    public function index()
    {
        $seguimientos = Auth::user()->seguimientos()->latest()->paginate(15);
        return view('seguimientos.index', compact('seguimientos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cuit' => 'required|digits:11',
            'denominacion' => 'string|max:255',
            'situations' => 'required|json', // Validate the incoming data
        ]);

        $allSituations = json_decode($request->situations, true);

        // We only want to store the entity and situation for a clean record
        $filteredSituations = array_map(function ($item) {
            return [
                'entidad' => $item['entidad'] ?? 'N/A',
                'situacion' => $item['situacion'] ?? 0,
            ];
        }, $allSituations);

        Auth::user()->seguimientos()->create([
            'cuit' => $request->cuit,
            'denominacion' => $request->denominacion,
            'situations' => $filteredSituations, // Store the filtered array
        ]);

        return back()->with('success', 'Ahora estás siguiendo a ' . $request->denominacion);
    }

    public function destroy($cuit)
    {
        $seguimiento = Auth::user()->seguimientos()->where('cuit', $cuit)->firstOrFail();
        $denominacion = $seguimiento->denominacion;
        $seguimiento->delete();

        return back()->with('success', 'Has dejado de seguir a ' . $denominacion);
    }
}

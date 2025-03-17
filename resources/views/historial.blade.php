@extends('layouts.app')  <!-- Extend your base layout -->
@section('title', 'Historial')

@section('content')
<div class="container">
    <h1>Historial Response</h1>

    <!-- Access $data (passed from controller) -->
    <p>Status: {{ $data['status'] }}</p>

    <h2>Results</h2>
    <p>Identificación: {{ $data['results']['identificacion'] }}</p>
    <p>Denominación: {{ $data['results']['denominacion'] }}</p>

    <h3>Periodos</h3>
    @foreach ($data['results']['periodos'] as $periodo)
        <div>
            <p>Periodo: {{ $periodo['periodo'] }}</p>
            <h4>Entidades</h4>
            @foreach ($periodo['entidades'] as $entidad)
                <ul>
                    <li>Entidad: {{ $entidad['entidad'] }}</li>
                    <li>Situación: {{ $entidad['situacion'] }}</li>
                    <li>Monto: {{ number_format($entidad['monto'], 2) }}</li>
                    <li>En Revisión: {{ $entidad['enRevision'] ? 'Sí' : 'No' }}</li>
                    <li>Proceso Judicial: {{ $entidad['procesoJud'] ? 'Sí' : 'No' }}</li>
                </ul>
            @endforeach
        </div>
    @endforeach
</div>
@endsection


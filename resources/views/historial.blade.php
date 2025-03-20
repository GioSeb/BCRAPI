@extends('layouts.app')  <!-- Extend your base layout -->
@section('title', 'Historial')

@section('content')
{{-- <div class="w-screen">
    <div class="flex items-center justify-center mb-10">
        <h1 class="text-center text-3xl font-bold">
            Informe sobre: {{ $data['results']['identificacion'] }}
        </h1>
    </div> --}}
    <!-- Access $data (passed from controller) -->
    {{-- <p class="hidden">Status: {{ $data['status'] }}</p> --}}
{{--     <div class="flex flex-col items-center justify-center space-y-4">
        <p class="text-center">Inicio del informe</p>

        <div class="flex items-left space-x-4">
            <img src="{{asset('img/informe/separator.png')}}" alt="flecha" class="w-8 h-8">
            <h2 class="text-center">Resultados</h2>
        </div>

        <div class="text-center space-y-2">
            <p>Identificación: {{ $data['results']['identificacion'] }}</p>
            <p>Denominación: {{ $data['results']['denominacion'] }}</p>
        </div>
    </div> --}}

    {{-- INICIO INFORME --}}
    <div class="scoring">
        <br>
        <h3 class="begin_report">Inicio del informe</h3>

        <br />
        {{-- Identificacion --}}
        <table class="scoring_main" style="border: solid; border-color: #999999;">
            <tr>
                <td colspan="4" class="subtitle"><img src="{{asset('img/historial/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;"/> Identificación</td>
            </tr>
            <tr>
                <td class="key">Apellido, Nombre, Razón Social</td>
                <td colspan="3" class="razonsocial" id="razonsocial">{{ $data['results']['denominacion'] }}</td>
            </tr>
            <tr>
                <td class="key">CUIT/CUIL</td>
                <td id="cuitvalue">{{ $data['results']['identificacion'] }}</td>
                <td class="key">Documento</td>
                <td>{{ substr($data['results']['identificacion'], 2, -1) }}</td>
            </tr>
        </table>

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


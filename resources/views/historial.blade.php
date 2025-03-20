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

        {{-- Central de deudores --}}

        <h2>Central de deudores</h2>
        <ul>
            <li>Entidad: Entidad bancaria acreedora.</li>
            <li>Situación:
                <ul>
                    <li style="color: green">0: <strong> Sin deuda</strong></li>
                    <li style="color: darkcyan">1: <strong> En situación normal | Situación normal</strong></li>
                    <li style="color: darkmagenta">2: <strong> Con seguimiento especial | Riesgo bajo</strong></li>
                    <li style="color: goldenrod">3: <strong> Con problemas | Riesgo medio</strong></li>
                    <li style="color: darkorange">4: <strong> Con alto riesgo de insolvencia | Riesgo alto</strong></li>
                    <li style="color: red">5: <strong> Irrecuperable | Irrecuperable</strong></li>
                </ul>
            </li>
            <li>Monto: Monto adeudado <strong>expresado en miles de pesos.</strong></li>
            {{-- <li>TO DO dias de retraso al endpoint deudores</li> --}}
            {{-- <li>TO DO observaciones al endpoint deudores</li> --}}
            <li>Período: En formato AAAAMM, indica el último período informado por la entidad.</li>
            <li>En revisión: Información sometida a revisión.</li>
            <li>Proceso jurídico: Información sometida a proceso judicial</li>
        </ul>

        {{-- TO DO principal deuda endpoint deudores --}}

        <table class="scoring_main" style="border: solid; border-color: #999999;">
            <tr>
                <td colspan="4" class="subtitle"><img src="{{asset('img/historial/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;" /> Central de Riesgo (Cifras expresadas en miles de Pesos)</td>
            </tr>
            <tr>
                <td colspan="4" class="comments">
                    <p>Las entidades que componen el sistema financiero regulado por el BANCO CENTRAL DE LA REPUBLICA ARGENTINA informan mensualmente al mismo los créditos otorgados, montos y situación de pago, reservándose de informar aquellos créditos que por montos pequeños o garantías especiales no revelan riesgo en el sistema. Cualquier incumplimiento activa la publicidad del dato y se incorpora la totalidad de la operatoria.</p>
                </td>
            </tr>
        </table>
{{--             <tr>
                <td colspan="4" class="nopad"> --}}

                    <table class="detalle" width="100%" style="border: solid; border-color: #999999;">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center" class="column">Entidad</th>
                                <th scope="col" style="text-align: center" class="column">Período</th>
                                <th scope="col" style="text-align: center" class="column">Situación</th>
                                <th scope="col" style="text-align: center" class="column">Monto</th>
                                <th scope="col" style="text-align: center" class="column">En revisión</th>
                                <th scope="col" style="text-align: center" class="column">Proceso judicial</th>
                            </tr>
                        </thead>
        </table>

                        <!-- START BLOCK : detalle_deuda -->
  {{--                       <tr>
                            <td>{entidad}</td>
                            <td align="center" width="70">{fecha}</td>
                            <td align="center" width="40"><span class="std std_{situacion}">{situacion}</span></td>
                            <td align="center" width="40">{deuda}</td>
                        </tr> --}}
                        <!-- END BLOCK : detalle_deuda -->
                    </table>
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


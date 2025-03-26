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
                    <li style="color: #0a0">0: <strong> Sin deuda</strong></li>
                    <li style="color: #0a0">1: <strong> En situación normal | Situación normal</strong></li>
                    <li style="color: #0a0">2: <strong> Con seguimiento especial | Riesgo bajo</strong></li>
                    <li style="color: #aaa369">3: <strong> Con problemas | Riesgo medio</strong></li>
                    <li style="color: #a00">4: <strong> Con alto riesgo de insolvencia | Riesgo alto</strong></li>
                    <li style="color: #a00">5: <strong> Irrecuperable | Irrecuperable</strong></li>
                </ul>
            </li>
            <li>Monto: Monto adeudado <strong>expresado en miles de pesos.</strong></li>
            {{-- <li>TO DO dias de retraso al endpoint deudores</li> --}}
            {{-- <li>TO DO observaciones al endpoint deudores</li> --}}
            <li>Período: En formato AAAAMM, indica el último período informado por la entidad.</li>
            <li>En revisión: Información sometida a revisión.</li>
            <li>Proceso jurídico: Información sometida a proceso judicial</li>
        </ul>


        <table class="scoring_main" style="border: solid; border-color: #999999;">
            <tr>
                <td colspan="4" class="subtitle"><img src="{{asset('img/historial/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;" /> Central de Riesgo (Cifras expresadas en miles de Pesos)</td>
            </tr>
            <tr>
                <td colspan="4" class="comments" style="margin-block-end: 10px; margin-block-start: 10px;">
                    <p>Las entidades que componen el sistema financiero regulado por el BANCO CENTRAL DE LA REPUBLICA ARGENTINA informan mensualmente al mismo los créditos otorgados, montos y situación de pago, reservándose de informar aquellos créditos que por montos pequeños o garantías especiales no revelan riesgo en el sistema. Cualquier incumplimiento activa la publicidad del dato y se incorpora la totalidad de la operatoria.</p>
                </td>
            </tr>
        </table>

        {{-- TO DO principal deuda endpoint deudores --}}

        {{-- TO DO change style to not be the same as central de deudores --}}
        @foreach ( $data['results']['entidades'] as $entidad)
            <div class="entidad">
                <div class="header" onclick="toggleEntidad(this)">
                    <h2>{{ $entidad['entidad'] }}</h2>
                    <span class="toggle-symbol">+</span>
                </div>
                    <table class="historialTable">
                        <thead>
                            <tr>
                                <th>Período</th>
                                <th>Situación</th>
                                <th>Monto</th>
                                <th>En revisión</th>
                                <th>En proceso judicial</th>
                            </tr>
                        </thead>
                            <tbody class="content">
                                    @foreach ($entidad['periodos'] as $periodo)
                                        <tr class="periodo">
                                            <td>{{ \Carbon\Carbon::createFromFormat('Ym', $periodo['periodo'])->format('m/Y') }}</td>
                                            <td class="std_{{$periodo['situacion']}}">{{ $periodo['situacion'] }}</td>
                                            <td>{{ $periodo['monto'] }}</td>
                                            <td>
                                                @if ($periodo['enRevision'] === false)
                                                No
                                                @else
                                                Si
                                            @endif
                                            <td>
                                                @if ($periodo['procesoJud'] === false)
                                                No
                                                @else
                                                Si
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                </table>
            </div>
        @endforeach

{{--                      @foreach ($entidades['entidades'] as $entidad)
                            <table class="detalle" width="100%" style="border: solid; border-color: #999999;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center" class="column">Entidad: {{$entidad['entidad']}}</th>
                                        <th scope="col" style="text-align: center" class="column">Período</th>
                                        <th scope="col" style="text-align: center" class="column">Situación: {{$entidad['situacion']}}</th>
                                        <th scope="col" style="text-align: center" class="column">Monto: {{ number_format($entidad['monto'], 2) }}</th>
                                        <th scope="col" style="text-align: center" class="column">En revisión: {{ $entidad['enRevision'] ? 'Sí' : 'No' }}</th>
                                        <th scope="col" style="text-align: center" class="column">Proceso judicial: {{ $entidad['procesoJud'] ? 'Sí' : 'No' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach --}}




                        <!-- START BLOCK : detalle_deuda -->
  {{--                       <tr>
                            <td>{entidad}</td>
                            <td align="center" width="70">{fecha}</td>
                            <td align="center" width="40"><span class="std std_{situacion}">{situacion}</span></td>
                            <td align="center" width="40">{deuda}</td>
                        </tr> --}}
                        <!-- END BLOCK : detalle_deuda -->
{{--     @foreach ($data['results']['periodos'] as $periodo)
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
    @endforeach --}}
</div>
@endsection


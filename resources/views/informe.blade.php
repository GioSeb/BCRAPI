@extends('layouts.app')  <!-- Extend your base layout -->
@section('title', 'Historial')

@section('content')
{{-- <div class="w-screen">
    <div class="flex items-center justify-center mb-10">
        <h1 class="text-center text-3xl font-bold">
            Informe sobre: {{ $historial['results']['identificacion'] }}
        </h1>
    </div> --}}
    <!-- Access $historial (passed from controller) -->
    {{-- <p class="hidden">Status: {{ $historial['status'] }}</p> --}}
{{--     <div class="flex flex-col items-center justify-center space-y-4">
        <p class="text-center">Inicio del informe</p>

        <div class="flex items-left space-x-4">
            <img src="{{asset('img/informe/separator.png')}}" alt="flecha" class="w-8 h-8">
            <h2 class="text-center">Resultados</h2>
        </div>

        <div class="text-center space-y-2">
            <p>Identificación: {{ $historial['results']['identificacion'] }}</p>
            <p>Denominación: {{ $historial['results']['denominacion'] }}</p>
        </div>
    </div> --}}

    {{-- INICIO INFORME --}}
    {{-- TO DO include bcra legislation --}}
    <div class="scoring">
        <br>
        <h3 class="begin_report">Inicio del informe</h3>

        <br />
        {{-- Identificacion --}}
        <table class="scoring_main" style="border: solid; border-color: #999999;">
            <tr>
                <td colspan="4" class="subtitle"><img src="{{asset('img/informe/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;"/> Identificación</td>
            </tr>
            <tr>
                <td class="key">Apellido, Nombre, Razón Social</td>
                <td colspan="3" class="razonsocial" id="razonsocial">{{ $historial['results']['denominacion'] }}</td>
            </tr>
            <tr>
                <td class="key">CUIT/CUIL</td>
                <td id="cuitvalue">{{ $historial['results']['identificacion'] }}</td>
                <td class="key">Documento</td>
                <td>{{ substr($historial['results']['identificacion'], 2, -1) }}</td>
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
                <td colspan="4" class="subtitle"><img src="{{asset('img/informe/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;" /> Central de Riesgo (Cifras expresadas en miles de Pesos)</td>
            </tr>
            <tr>
                <td colspan="4" class="comments" style="margin-block-end: 10px; margin-block-start: 10px;">
                    <p>Las entidades que componen el sistema financiero regulado por el BANCO CENTRAL DE LA REPUBLICA ARGENTINA informan mensualmente al mismo los créditos otorgados, montos y situación de pago, reservándose de informar aquellos créditos que por montos pequeños o garantías especiales no revelan riesgo en el sistema. Cualquier incumplimiento activa la publicidad del dato y se incorpora la totalidad de la operatoria.</p>
                </td>
            </tr>
        </table>

        {{-- TO DO principal deuda endpoint deudores --}}
        @if ($deudor['status'] === 200)
            <table class="deudorTable">
                <thead>
                    <tr>
                        <th>Entidad</th>
                        <th>Situación</th>
                        <th>Monto</th>
                        <th>Período</th>
                        <th>Dias de atraso</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deudor['results']['periodos'] as $arrayDeudor)
                        @foreach ($arrayDeudor['entidades'] as $entidadDeudor)
                            <tr class="periodo">
                                <td>{{ $entidadDeudor['entidad'] }}</td>
                                <td class="std_{{$entidadDeudor['situacion']}}" >{{ $entidadDeudor['situacion'] }}</td>
                                <td>{{ $entidadDeudor['monto'] }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Ym', $arrayDeudor['periodo'])->format('m/Y') }}</td>
                                <td>{{ $entidadDeudor['diasAtrasoPago'] }}</td>
                                <td>
                                    <div>
                                        @if ($entidadDeudor['refinanciaciones'] === true)
                                            <p>Refinanciación: Si</p>
                                        @endif
                                        @if ($entidadDeudor['recategorizacionOblig'] === true)
                                            <p>Recategorización Obligatoria: Si</p>
                                        @endif
                                        @if ($entidadDeudor['situacionJuridica'] === true)
                                            <p>Situación Jurídica: Si</p>
                                        @endif
                                        @if ($entidadDeudor['irrecDisposicionTecnica'] === true)
                                            <p>Irrecuperable por Disposición Técnica: Si</p>
                                        @endif
                                        @if ($entidadDeudor['enRevision'] === true)
                                            <p>En Revisión: Si</p>
                                        @endif
                                        @if ($entidadDeudor['procesoJud'] === true)
                                            <p>Proceso Judicial: Si</p>
                                        @endif
                                        @if ($entidadDeudor['refinanciaciones'] === false && $entidadDeudor['recategorizacionOblig'] === false && $entidadDeudor['situacionJuridica'] === false && $entidadDeudor['irrecDisposicionTecnica'] === false && $entidadDeudor['enRevision'] === false && $entidadDeudor['procesoJud'] === false)
                                            <p>-</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @endforeach
                </tbody>
            </table>
        @else
            <div>
                <h2>
                    {{ $deudor['errorMessages'] }}
                </h2>
            </div>
        @endif

        {{-- TO DO change style to not be the same as central de deudores --}}
        @foreach ( $historial['results']['entidades'] as $entidadHistorial)
            <div class="entidad">
                <div class="header" onclick="toggleEntidad(this)">
                    <h2>{{ $entidadHistorial['entidad'] }}</h2>
                    <span class="toggle-symbol">+</span>
                </div>
                    <table class="historialTable">
                        <thead class="historialHead">
                            <tr>
                                <th>Período</th>
                                <th>Situación</th>
                                <th>Monto</th>
                                <th>En revisión</th>
                                <th>En proceso judicial</th>
                            </tr>
                        </thead>
                            <tbody class="content">
                                    @foreach ($entidadHistorial['periodos'] as $periodo)
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

        {{-- cheques rechazados --}}

        <table class="scoring_main" style="border: solid; border-color: #999999;">
            <tr>
                <td colspan="4" class="subtitle"><img src="{{asset('img/informe/separator.png')}}" style="border: 0; width: 24px; height: 24px; align-self: left;" /> Cheques Rechazados</td>
            </tr>
            <tr>
                <td colspan="4" class="comments" style="margin-block-end: 10px; margin-block-start: 10px;">
                    <p>Estas consultas se realizan sobre la Central de cheques rechazados, conformada por datos
                        recibidos diariamente de los bancos, que se publican sin alteraciones de acuerdo con los plazos
                        dispuestos en el inciso 4 del artículo 26 de la Ley 25.326 de Protección de los Datos Personales
                        y con el criterio establecido en el punto 1.3. de la Sección 1 del Texto ordenado Centrales de
                        Información.</p>
                </td>
            </tr>
            {{-- TO DO find refused checks to see the table --}}
            <tr>
                <td>
                    {{-- TO DO style --}}
                    {{-- sin rechazos --}}
                    <p class="informe_clean"><img src="{{asset('img/informe/clean.png')}}" alt="limpio">No registra cheques rechazados.</p>
                </td>
            </tr>

        </table>

    </div>
@endsection


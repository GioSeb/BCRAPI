{{-- resources/views/informe.blade.php --}}
@extends('layouts.app')
@section('title', 'Informe Detallado')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 py-8">
    <div class="container mx-auto px-4">

        {{-- Report Header & Follow Button --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100">
                        Informe de Riesgo Crediticio
                    </h1>
                    <p class="text-gray-500 dark:text-gray-400 mt-1">
                        Análisis sobre: <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $historial['results']['denominacion'] }}</span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    @if ($isFollowing)
                        <form action="{{ route('seguimientos.destroy', $historial['results']['identificacion']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                                <img src="{{ asset('img/informe/unfollow.png') }}" alt="Unfollow Icon" class="h-5 w-5">
                                Dejar de Seguir
                            </button>
                        </form>
                    @else
                        <form action="{{ route('seguimientos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cuit" value="{{ $historial['results']['identificacion'] }}">
                            @if ($historial['results']['denominacion'] === !null)
                                <input type="hidden" name="denominacion" value="{{ $historial['results']['denominacion'] }}">
                            @else
                                <input type="hidden" name="denominacion" value="Sin denominación.">
                            @endif

                            @php
                                $allSituations = $deudor['results']['periodos'][0]['entidades'] ?? [];
                            @endphp
                            <input type="hidden" name="situations" value="{{ json_encode($allSituations) }}">
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                                <img src="{{ asset('img/informe/follow.png') }}" alt="Follow Icon" class="h-5 w-5">
                                Seguir CUIT
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        {{-- Identification Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-3">
                <img src="{{ asset('img/informe/identification.png') }}" alt="Identification Icon" class="h-6 w-6">
                Identificación
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-sm">
                <div>
                    <p class="text-gray-500 dark:text-gray-400">Razón Social</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $historial['results']['denominacion'] }}</p>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400">CUIT/CUIL</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $historial['results']['identificacion'] }}</p>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400">Documento</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ substr($historial['results']['identificacion'], 2, -1) }}</p>
                </div>
            </div>
        </div>

        {{-- Rejected Checks Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-3">
                 <img src="{{ asset('img/informe/checks.png') }}" alt="Checks Icon" class="h-6 w-6">
                Central de Cheques Rechazados
            </h2>
             @if ($rechazados['status'] === 200 && !empty($rechazados['results']['causales']))
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Entidad</th>
                                <th scope="col" class="px-6 py-3">Nro. Cheque</th>
                                <th scope="col" class="px-6 py-3 text-right">Monto</th>
                                <th scope="col" class="px-6 py-3 text-center">Fecha Rechazo</th>
                                <th scope="col" class="px-6 py-3">Causal</th>
                                <th scope="col" class="px-6 py-3 text-center">Fecha Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rechazados['results']['causales'] as $causal)
                                @foreach ($causal['entidades'] as $entidad)
                                    @foreach ($entidad['detalle'] as $detalleCheque)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $entidad['nombreEntidad'] ?? 'No disponible' }}</td>
                                            <td class="px-6 py-4 font-mono">{{ $detalleCheque['nroCheque'] }}</td>
                                            <td class="px-6 py-4 text-right font-mono">${{ number_format($detalleCheque['monto'], 2, ',', '.') }}</td>
                                            <td class="px-6 py-4 text-center">{{ \Carbon\Carbon::parse($detalleCheque['fechaRechazo'])->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4">{{ $causal['causal'] }}</td>
                                            <td class="px-6 py-4 text-center">{{ $detalleCheque['fechaPago'] ? \Carbon\Carbon::parse($detalleCheque['fechaPago'])->format('d/m/Y') : '-' }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 px-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-700">
                    <div class="flex items-center justify-center gap-3 text-green-700 dark:text-green-300">
                        <img src="{{ asset('img/informe/clean.png') }}" alt="Clean Icon" class="h-6 w-6">
                        <p class="font-semibold">No se registran cheques rechazados.</p>
                    </div>
                </div>
            @endif
        </div>

        {{-- Debtors Central Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-3">
                <img src="{{ asset('img/informe/debtors.png') }}" alt="Debtors Icon" class="h-6 w-6">
                Central de Deudores del Sistema Financiero
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                Información sobre deudas con entidades financieras. Los montos están expresados en miles de pesos.
            </p>

            @if ($deudor['status'] === 200)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Entidad</th>
                                <th scope="col" class="px-6 py-3 text-center">Situación</th>
                                <th scope="col" class="px-6 py-3 text-right">Monto (Miles)</th>
                                <th scope="col" class="px-6 py-3 text-center">Período</th>
                                <th scope="col" class="px-6 py-3">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deudor['results']['periodos'] as $arrayDeudor)
                                @foreach ($arrayDeudor['entidades'] as $entidadDeudor)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $entidadDeudor['entidad'] }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $situacionClass = '';
                                                $situacionText = 'Desconocida';
                                                switch ($entidadDeudor['situacion']) {
                                                    case 0: $situacionClass = 'bg-gray-100 text-gray-800'; $situacionText = 'Sin Deuda'; break;
                                                    case 1: $situacionClass = 'bg-green-100 text-green-800'; $situacionText = 'Normal'; break;
                                                    case 2: $situacionClass = 'bg-blue-100 text-blue-800'; $situacionText = 'Riesgo Bajo'; break;
                                                    case 3: $situacionClass = 'bg-yellow-100 text-yellow-800'; $situacionText = 'Riesgo Medio'; break;
                                                    case 4: $situacionClass = 'bg-orange-100 text-orange-800'; $situacionText = 'Riesgo Alto'; break;
                                                    case 5: $situacionClass = 'bg-red-100 text-red-800'; $situacionText = 'Irrecuperable'; break;
                                                }
                                            @endphp
                                            <span class="px-2 py-1 font-semibold leading-tight rounded-full text-xs {{ $situacionClass }}">
                                                {{ $situacionText }} ({{$entidadDeudor['situacion']}})
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right font-mono">${{ number_format($entidadDeudor['monto'], 2, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-center">{{ \Carbon\Carbon::createFromFormat('Ym', $arrayDeudor['periodo'])->format('m/Y') }}</td>
                                        <td class="px-6 py-4">
                                            @if ($entidadDeudor['procesoJud']) <span class="text-red-500 font-semibold">En Proceso Judicial</span> @else - @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 px-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <p class="text-gray-700 dark:text-gray-300">{{ $deudor['errorMessages'] }}</p>
                </div>
            @endif
        </div>

        {{-- Historical Data by Entity --}}
        <div class="space-y-4 mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-0 flex items-center gap-3">
                <img src="{{ asset('img/informe/history.png') }}" alt="History Icon" class="h-6 w-6">
                Historial por Entidad
            </h2>
            @foreach ( $historial['results']['entidades'] as $entidadHistorial)
                <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div @click="open = !open" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200">{{ $entidadHistorial['entidad'] }}</h3>
                        <button class="text-blue-500">
                            <span x-show="!open">Ver Detalles</span>
                            <span x-show="open">Ocultar Detalles</span>
                        </button>
                    </div>
                    <div x-show="open" x-transition class="p-4 border-t dark:border-gray-600">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-6 py-3">Período</th>
                                        <th class="px-6 py-3 text-center">Situación</th>
                                        <th class="px-6 py-3 text-right">Monto (Miles)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entidadHistorial['periodos'] as $periodo)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::createFromFormat('Ym', $periodo['periodo'])->format('m/Y') }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-2 py-1 font-semibold leading-tight rounded-full text-xs {{-- Add classes based on situation --}}">
                                                {{ $periodo['situacion'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right font-mono">${{ number_format($periodo['monto'], 2, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

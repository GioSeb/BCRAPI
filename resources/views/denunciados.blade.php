{{-- resources/views/denunciados.blade.php --}}
@extends('layouts.app')
@section('title', 'Consulta de Cheque Denunciado')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 py-12 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Page Header --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Sector de Cheques</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Consulta de cheques denunciados.</p>
            </div>

            @if ($denunciado['status'] === 200)
                @php
                    $isDenunciado = $denunciado['results']['denunciado'] === true;
                @endphp

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden">
                    {{-- Card Header: Changes color based on status --}}
                    <div class="p-5 {{ $isDenunciado ? 'bg-red-600' : 'bg-green-600' }}">
                        <div class="flex items-center gap-4">
                            @if ($isDenunciado)
                                <img src="{{ asset('img/cheques/denunciado.png') }}" alt="Denunciado Icon" class="h-8 w-8">
                            @else
                                <img src="{{ asset('img/cheques/no-denunciado.png') }}" alt="No Denunciado Icon" class="h-8 w-8">
                            @endif
                            <div>
                                <h2 class="text-2xl font-bold text-white">
                                    {{ $isDenunciado ? 'Cheque Denunciado' : 'Cheque No Denunciado' }}
                                </h2>
                                <p class="text-sm text-white/80">
                                    Resultado de la consulta para el cheque Nro. {{ $denunciado['results']['numeroCheque'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-6 space-y-6">
                        {{-- Basic Check Info --}}
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2 mb-3">
                                Datos del Cheque
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Número de Cheque</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100 font-mono">{{ $denunciado['results']['numeroCheque'] }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Entidad Financiera</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $denunciado['results']['denominacionEntidad'] }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Details for Reported Checks --}}
                        @if ($isDenunciado)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2 mb-3">
                                Detalles de la Denuncia
                            </h3>
                            <div class="space-y-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Fecha de Procesamiento</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($denunciado['results']['fechaProcesamiento'])->format('d/m/Y') }}</p>
                                </div>
                                @foreach ($denunciado['results']['detalles'] as $detalle)
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-gray-500 dark:text-gray-400">Número de Cuenta</p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100 font-mono">{{ $detalle['numeroCuenta'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 dark:text-gray-400">Causal de la Denuncia</p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $detalle['causal'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            @else
                {{-- Error/Not Found State --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center">
                    <img src="{{ asset('img/informe/error.png') }}" alt="Error Icon" class="h-12 w-12 mx-auto mb-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">No se pudo completar la consulta</h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                        Hubo un problema al intentar obtener la información del cheque. Por favor, intente nuevamente más tarde.
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

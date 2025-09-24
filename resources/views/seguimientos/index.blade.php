@extends('layouts.app')  <!-- Extend your base layout -->
@section('title', 'Informe')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Seguimientos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Aquí encontrarás la lista de los CUITs que estás siguiendo. El sistema revisará mensualmente si hay novedades y te notificará.
                    </p>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Razón Social</th>
                                    <th scope="col" class="px-6 py-3">CUIT</th>
                                    <th scope="col" class="px-6 py-3">Situaciones Conocidas</th>
                                    <th scope="col" class="px-6 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($seguimientos as $seguimiento)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white align-top">
                                            {{ $seguimiento->denominacion }}
                                        </th>
                                        <td class="px-6 py-4 align-top">{{ $seguimiento->cuit }}</td>
                                        <td class="px-6 py-4">
                                            {{-- This is the new section that loops through all situations --}}
                                            <div class="space-y-2">
                                                {{-- Add a check to ensure situations is an array before looping --}}
                                                @if (is_array($seguimiento->situations) && !empty($seguimiento->situations))
                                                    @foreach ($seguimiento->situations as $situation)
                                                        <div class="flex items-center justify-between gap-4">
                                                            <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ $situation['entidad'] ?? 'N/A' }}</span>
                                                            @php
                                                                $situacionClass = '';
                                                                $situacionText = 'Sin datos de situación.';
                                                                switch ($situation['situacion']) {
                                                                    case 0: $situacionClass = 'bg-gray-100 text-gray-800'; $situacionText = 'Sin Deuda'; break;
                                                                    case 1: $situacionClass = 'bg-green-100 text-green-800'; $situacionText = 'Normal'; break;
                                                                    case 2: $situacionClass = 'bg-blue-100 text-blue-800'; $situacionText = 'Riesgo Bajo'; break;
                                                                    case 3: $situacionClass = 'bg-yellow-100 text-yellow-800'; $situacionText = 'Riesgo Medio'; break;
                                                                    case 4: $situacionClass = 'bg-orange-100 text-orange-800'; $situacionText = 'Riesgo Alto'; break;
                                                                    case 5: $situacionClass = 'bg-red-100 text-red-800'; $situacionText = 'Irrecuperable'; break;
                                                                }
                                                            @endphp
                                                            <span class="px-2 py-1 font-semibold leading-tight rounded-full text-xs {{ $situacionClass }}">
                                                               ({{$situacionText}}) ({{$situation['situacion']}})
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    {{-- This will now display for records with null or empty situations --}}
                                                    <span class="text-gray-500">Sin datos de situación.</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <form action="{{ route('seguimientos.destroy', $seguimiento->cuit) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">
                                                    Dejar de Seguir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Aún no estás siguiendo ningún CUIT. Realiza una consulta y haz clic en "Seguir CUIT".
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($seguimientos->hasPages())
                        <div class="mt-4">
                            {{ $seguimientos->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

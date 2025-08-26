@extends('layouts.app')
@section('title', 'Nuevo Informe')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            {{-- Header Section --}}
            <div class="bg-gray-800 dark:bg-black p-8 text-center">
                <h1 class="text-3xl font-bold text-white">Generar Nuevo Informe de Riesgo</h1>
                <p class="text-gray-300 mt-2">Ingrese un CUIT o CUIL para obtener un análisis crediticio detallado.</p>
            </div>

            {{-- Form Section --}}
            <div class="p-8">
                <form action="{{ route('informe') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4">
                    <label for="cuit" class="sr-only">Ingrese CUIT/CUIL</label>
                    <div class="relative flex-grow w-full">
                        <svg class="w-6 h-6 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm-2.25-2.25v-1.5a2.25 2.25 0 012.25-2.25h15a2.25 2.25 0 012.25 2.25v1.5m-19.5-6.375v-1.5a2.25 2.25 0 012.25-2.25h15a2.25 2.25 0 012.25 2.25v1.5" />
                        </svg>
                    <div class="relative">
                        <input class="w-full pl-12 pr-4 py-3 text-lg text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                            {{ $errors->has('cuit') ? 'border-red-500' : 'border-transparent' }}"
                            type="text"
                            name="cuit"
                            id="cuit"
                            placeholder="Ej: 20123456789"
                            required />

                        @error('cuit')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>
                    <button class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" type="submit">
                        Consultar
                    </button>
                </form>
            </div>

            {{-- Informational Section --}}
            <div class="p-8 border-t border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Información Importante</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Nuestros informes se basan en datos provistos por el <strong>Banco Central de la República Argentina (BCRA)</strong> y otras fuentes públicas.
                    Aquí podrás consultar un reporte integral, organizado por clave de identificación tributaria (CUIT o CUIL), que detalla los financiamientos otorgados por diversas entidades: desde organizaciones bancarias y fideicomisos, hasta empresas no financieras emisoras de tarjetas, proveedores de préstamos bancarios, compañías de garantía compartida, fondos de garantía públicos y servicios de crédito entre usuarios vía plataformas. Adicionalmente, se incluye el registro de cheques impagos.
                    Es importante destacar que los datos presentados son suministrados por las propias entidades, y su publicación no constituye una validación oficial por parte de nuestra autoría. La información sobre la situación crediticia, deudas y cheques rechazados se actualiza mensualmente. Este informe constituye una herramienta de análisis y no debe ser la única fuente para la toma de decisiones comerciales.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

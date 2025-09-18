@extends('layouts.app')
@section('title', 'Sector de cheques')

@section('content')
{{-- En esta base podrás consultar cheques denunciados como extraviados, sustraídos o adulterados.

La información disponible aquí es suministrada por las entidades bancarias que operan en el país y se publica sin alteraciones.

Su difusión no implica conformidad por parte de este Banco Central.

Al realizar una consulta:

Tené en cuenta que en el menú solo se despliegan las entidades que registran cheques denunciados vigentes a la fecha de la consulta.
Verificá que el número de cheque coincida en los 4 lugares del documento donde se encuentra impreso. Si encontrás diferencias, podría tratarse de un documento adulterado.
Verificá si el número de la sucursal y el de la cuenta que muestra la pantalla coinciden con el que está impreso en el documento, ya que el número de cheque puede repetirse en distintas cuentas corrientes pertenecientes a un mismo banco.
En el caso de que una entidad aparezca más de una vez en el listado deberás consultar el cheque en cada una de las denominaciones que se muestren. --}}
<div class="container mx-auto px-4 py-12">
        {{-- Main container card --}}
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            {{-- Header section with a title --}}
            <div class="bg-gray-800 dark:bg-black p-8 text-center">
                <h1 class="text-3xl font-bold text-white">Generar Informe de Cheque</h1>
                <p class="text-gray-300 mt-2">Ingrese el número de cheque a consultar y la entidad financiera a la que pertenece.</p>
            </div>

<div class="my-4 px-4">
    {{-- Formulario para entrada con proteccion CSRF --}}
    <form action="{{ route('denunciados.show') }}" method="POST" class="flex flex-col gap-y-4">
        @csrf

        {{-- Contenedor para ambos campos de entrada --}}
        <div class="flex flex-col gap-y-4 sm:flex-row sm:items-center sm:gap-x-4">
            {{-- Grupo de entrada para Numero de Cheque --}}
            <div class="flex flex-col w-full sm:flex-row sm:items-center sm:space-x-4 sm:w-1/2">
                <label for="cheque_numero" class="text-base font-medium text-gray-300 sm:whitespace-nowrap">
                    Numero de cheque
                </label>
                <input
                    type="text"
                    id="cheque_numero"
                    name="cheque_numero"
                    placeholder="12345678"
                    class="mt-1 block w-full rounded-full border-0 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 py-2.5 px-5 shadow-sm sm:text-sm sm:leading-6"
                >
            </div>

            {{-- Grupo de entrada para Entidad --}}
            <div class="flex flex-col w-full sm:flex-row sm:items-center sm:space-x-4 sm:w-1/2">
                <label for="entidad" class="text-base font-medium text-gray-300 sm:whitespace-nowrap">
                    Entidad
                </label>
                <select
                    name="entidad"
                    id="entidad"
                    class="mt-1 block w-full rounded-full border-0 bg-gray-700 text-white focus:ring-2 focus:ring-inset focus:ring-blue-500 py-2.5 px-5 shadow-sm sm:text-sm sm:leading-6"
                >
                    <option value="" selected></option>
                    @foreach ($bancos['results'] as $entidad)
                        <option value="{{$entidad['codigoEntidad']}}" class="text-white">{{$entidad['denominacion']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Boton de Accion (e.g., Consultar or Aceptar) --}}
        <div class="flex justify-center items-center mt-4">
            <button
                type="submit"
                class="w-full sm:w-auto px-8 py-3 text-lg font-bold text-white bg-blue-600 rounded-full shadow-lg hover:bg-blue-700 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
                Aceptar
            </button>
        </div>
    </form>
</div>



            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Result/Text area --}}
            <div class="p-8 border-t border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Información Importante</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    En esta base podrás consultar cheques denunciados por terceros o por su titular.
                </p>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    La información disponible aquí es suministrada por las entidades bancarias que operan en el país y se publica sin alteraciones. Su difusión no implica conformidad por parte del Banco Central o esta empresa.
                </p>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Nuestros informes se basan en la consulta a la base de datos del <strong>Banco Central de la República Argentina (BCRA)</strong>, proporcionando el estado de un cheque, si es o fue denunciado o rechazado, ya sea por su titular o por terceros. El informe detalla, en caso de denuncia, el número de cuenta que la originó. </p>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-4">
                    Al realizar una consulta:
                </p>
                <ul class="list-disc list-inside ml-4 text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                    <li>Ten en cuenta que en el menú solo se despliegan las entidades que registran cheques denunciados vigentes a la fecha de la consulta.</li>
                    <li>Verificá si el nombre de la entidad que muestra la pantalla coincide con el que está impreso en el documento, ya que el número de cheque puede repetirse en distintas entidades bancarias.</li>
                    <li>En el caso de que una entidad aparezca más de una vez en el listado deberás consultar el cheque en cada una de las denominaciones que se muestren.</li>
                </ul>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Los beneficios de este servicio incluyen:
                    <ul class="list-disc list-inside ml-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        <li><strong>Reducción de riesgos:</strong> Identificar cheques con problemas antes de aceptarlos.</li>
                        <li><strong>Prevención de fraudes:</strong> Verificar la validez de un documento para evitar pérdidas financieras.</li>
                        <li><strong>Toma de decisiones informadas:</strong> Acceder a datos confiables sobre el historial del cheque.</li>
                    </ul>
                </p>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-4">
                    Es importante destacar que este informe constituye una herramienta de análisis y no debe ser la única fuente para la toma de decisiones comerciales. La información se provee con fines orientativos, y la responsabilidad de su uso recae sobre el usuario.
                </p>
            </div>
        </div>
</div>

@endsection

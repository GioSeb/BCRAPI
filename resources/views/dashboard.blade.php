@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<div class="bg-gray-900 min-h-screen text-white">
    <div class="container mx-auto px-4 py-12">
        {{-- Header --}}
        <div class="text-center mb-12">
            <img class="h-16 w-auto mx-auto mb-4" src="{{ asset('img/logo-light.svg') }}" alt="Logo">
            <h1 class="text-4xl font-extrabold">Panel de Control</h1>
            <p class="text-gray-400 mt-2">Seleccione un servicio para comenzar.</p>
        </div>

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

            {{-- Service Card: Nueva Consulta --}}
            <a href="{{ route('nuevo-informe') }}" class="group bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-600 mb-6 group-hover:bg-blue-500 transition-colors">
                    <img src="{{ asset('img/dashboard/consulta.png') }}" alt="Nueva Consulta Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2">Nueva Consulta</h2>
                <p class="text-gray-400">Genere un nuevo informe de riesgo crediticio para un CUIT/CUIL específico.</p>
            </a>

            {{-- Service Card: Sector de Cheques (Example) --}}
            <a href="{{ route('sector-cheques') }}" class="group bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-600 mb-6 group-hover:bg-green-500 transition-colors">
                     <img src="{{ asset('img/dashboard/cheque.png') }}" alt="Sector de Cheques Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2">Sector de Cheques</h2>
                <p class="text-gray-400">Consulte el estado de cheques y verifique información relacionada.</p>
            </a>

            {{-- Service Card: Panel de Usuarios --}}
            {{-- This can be conditionally shown based on user role --}}
            @can('manage-users')
            <a href="{{route('admin.usuarios.index')}}" class="group bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-purple-600 mb-6 group-hover:bg-purple-500 transition-colors">
                    <img src="{{ asset('img/dashboard/usuarios.png') }}" alt="Panel de Usuarios Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2">Panel de Usuarios</h2>
                <p class="text-gray-400">Administre usuarios, roles y permisos de la plataforma.</p>
            </a>
            @endcan

            {{-- Service Card: Seguimientos --}}
            <a href="{{route('seguimientos.index')}}" class="group bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-600 mb-6 group-hover:bg-yellow-500 transition-colors">
                    <img src="{{ asset('img/dashboard/seguimientos.png') }}" alt="Seguimientos Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2">Seguimientos</h2>
                <p class="text-gray-400">Vea y gestione los CUITs que está siguiendo para monitorear cambios.</p>
            </a>

            {{-- Service Card: Historial --}}
            <a href="{{route('historial')}}" class="group bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-600 mb-6 group-hover:bg-red-500 transition-colors">
                    <img src="{{ asset('img/dashboard/historial.png') }}" alt="Historial Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2">Historial</h2>
                <p class="text-gray-400">Acceda a un registro completo de todas las consultas realizadas previamente.</p>
            </a>

            <div class="group bg-gray-800 p-8 rounded-2xl shadow-lg opacity-50 cursor-not-allowed relative" onclick="showAlert('Noticias')">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-600 mb-6 group-hover:bg-red-500 transition-colors mx-auto">
                    <img src="{{ asset('img/dashboard/notificacion.png') }}" alt="Noticias Icon" class="h-8 w-8">
                </div>
                <h2 class="text-2xl font-bold mb-2 text-center">Noticias</h2>
                <p class="text-gray-400 text-center">Su panel de resúmenes de las entidades seguidas.</p>
                {{-- Texto "Próximamente" superpuesto --}}
                <div class="absolute inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 rounded-2xl">
                    <span class="text-indigo-400 text-3xl font-extrabold animate-pulse">Próximamente</span>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function showAlert(serviceName) {
        // En un entorno real, aquí implementarías un modal de Tailwind o un componente JS.
        // Por ahora, usaremos un console.log y podrías agregar un div temporal si lo necesitas visible.
        console.log(`El servicio "${serviceName}" se incluirá próximamente.`);

        // Ejemplo simple de mostrar un mensaje temporal dentro del dashboard
        // Podrías tener un div oculto en el HTML y mostrarlo aquí.
        const messageContainer = document.getElementById('comingSoonMessage');
        if (messageContainer) {
            messageContainer.textContent = `¡El servicio "${serviceName}" estará disponible pronto!`;
            messageContainer.classList.remove('hidden');
            setTimeout(() => {
                messageContainer.classList.add('hidden');
            }, 3000); // Ocultar después de 3 segundos
        }
    }
</script>
@endsection

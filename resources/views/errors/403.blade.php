@extends ('layouts.app')
@section ('title', 'Su usuario no tiene acceso a esta página')

@section('content')

<div class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden text-center p-12">
            <!-- Icono de error -->
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-32 w-32 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-4">Acceso Denegado</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-4 leading-relaxed">
                Lo sentimos, no tienes los permisos necesarios para acceder a esta página.
                Si crees que esto es un error, por favor contacta al administrador del sistema.
            </p>
            <div class="mt-8">
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Ir a la página de inicio
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

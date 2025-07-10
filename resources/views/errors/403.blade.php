@extends ('layouts.app')
@section ('title', 'Su usuario no tiene acceso a esta página')

@section('content')

    <div class="text-center p-8 bg-white shadow-lg rounded-lg max-w-md w-full">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">403</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Acceso Denegado</h2>
        <p class="text-gray-600 mb-6">
            Lo sentimos, no tienes permiso para acceder a esta página.
            Por favor, contacta al administrador si crees que esto es un error.
        </p>
        <a href="{{ url('/') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-md transition duration-300 ease-in-out shadow-md">
            Volver al Inicio
        </a>
    </div>

@endsection

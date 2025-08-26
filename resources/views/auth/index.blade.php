@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <x-auth-session-status :status="session('status')" />
    <div>
        <div class="container mx-auto px-4 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left Side: Information --}}
            <div class="text-center lg:text-left">
                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    Decisiones de Negocio Inteligentes Basadas en Datos Confiables
                </h1>
                <p class="text-gray-300 text-lg mb-8">
                    Acceda a informes de riesgo crediticio completos y actualizados para minimizar riesgos y maximizar oportunidades. Nuestra plataforma le brinda la información que necesita para operar con seguridad.
                </p>
                <a href="#video-section" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-transform transform hover:scale-105">
                    Descubrir Más
                </a>
            </div>

            {{-- Right Side: Login Form --}}
            <div class="w-full max-w-md mx-auto">
                <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl">
                    <h2 class="text-2xl font-bold text-center mb-6">Acceso a Clientes</h2>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- Email Address --}}
                        <div class="mb-4">
                            <label class="block text-gray-400 text-sm font-bold mb-2" for="email">
                                Correo Electrónico
                            </label>
                            <input class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="email"
                                type="email"
                                name="email"
                                placeholder="nombre@empresa.com"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div class="mb-6">
                            <label class="block text-gray-400 text-sm font-bold mb-2" for="password">
                                Contraseña
                            </label>
                            <input class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="password"
                                type="password"
                                name="password"
                                placeholder="••••••••••"
                                required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mb-6">
                            {{-- Remember Me --}}
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded bg-gray-700 border-gray-600 text-blue-500 shadow-sm focus:ring-blue-500" name="remember">
                                <span class="ml-2 text-sm text-gray-400">{{ __('Recordarme') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidó su contraseña?') }}
                                </a>
                            @endif
                        </div>

                        {{-- Login Button --}}
                        <div>
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-transform transform hover:scale-105" type="submit">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    {{-- TO DO informativo --}}


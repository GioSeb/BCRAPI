@extends('layouts.app')
@section('title', 'Inicio de Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-900 px-4 py-12 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 p-10 bg-gray-800 rounded-2xl shadow-xl border border-gray-700">
        <div class="text-center">
            {{-- Logo para el formulario de login, similar al del dashboard --}}
            <img class="h-16 w-auto mx-auto mb-4" src="{{ asset('img/logo-light.svg') }}" alt="Logo Nexor">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                Inicia sesión en tu cuenta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                O
                <a href="{{ route('register') }}" class="font-medium text-indigo-500 hover:text-indigo-400">
                    contáctanos para una nueva cuenta
                </a>
            </p>
        </div>

        {{-- Mensaje de estado de sesión (ej. contraseña restablecida) --}}
        <x-auth-session-status class="mb-4 text-green-400 text-center" :status="session('status')" />

        {{-- Mensaje de error general (ej. credenciales inválidas) --}}
        @if (session('error'))
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-md relative text-center" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Campo de Email --}}
            <div>
                <x-input-label for="email" value="{{ __('Email') }}" class="text-gray-300" />
                <x-text-input id="email" class="block w-full px-4 py-2 mt-1 bg-gray-700 border-gray-600 rounded-md text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            {{-- Campo de Contraseña --}}
            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="text-gray-300" />
                <x-text-input id="password" class="block w-full px-4 py-2 mt-1 bg-gray-700 border-gray-600 rounded-md text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            {{-- Recordarme y Olvidé mi contraseña --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-600 rounded bg-gray-700">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                        {{ __('Recordarme') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-500 hover:text-indigo-400">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif
            </div>

            {{-- Botón de Iniciar Sesión --}}
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Iniciar sesión') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

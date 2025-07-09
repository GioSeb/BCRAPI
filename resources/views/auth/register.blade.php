@extends('layouts.app')
@section('title', 'Inicio')


@section('content')
{{-- <x-guest-layout> --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Actividad -->
        <div class="mt-4">
            <x-input-label for="actividad" :value="__('actividad')" />
            <x-text-input id="actividad" class="block mt-1 w-full" type="text" name="actividad" :value="old('actividad')" required />
            <x-input-error :messages="$errors->get('actividad')" class="mt-2" />
        </div>

        <!-- Cargo -->
        <div class="mt-4">
            <x-input-label for="cargo" :value="__('cargo')" />
            <x-text-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo')" required />
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>

        <!-- vinculo -->
        <div class="mt-4">
            <x-input-label for="vinculo" :value="__('vinculo')" />
            <x-text-input id="vinculo" class="block mt-1 w-full" type="text" name="vinculo" :value="old('vinculo')" required />
            <x-input-error :messages="$errors->get('vinculo')" class="mt-2" />
        </div>

        <!-- domicilio -->
        <div class="mt-4">
            <x-input-label for="domicilio" :value="__('domicilio')" />
            <x-text-input id="domicilio" class="block mt-1 w-full" type="text" name="domicilio" :value="old('domicilio')" required />
            <x-input-error :messages="$errors->get('domicilio')" class="mt-2" />
        </div>

        <!-- localidad -->
        <div class="mt-4">
            <x-input-label for="localidad" :value="__('localidad')" />
            <x-text-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required />
            <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
        </div>

        <!-- telefono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- cuit -->
        <div class="mt-4">
            <x-input-label for="cuit" :value="__('cuit')" />
            <x-text-input id="cuit" class="block mt-1 w-full" type="text" name="cuit" :value="old('cuit')" required />
            <x-input-error :messages="$errors->get('cuit')" class="mt-2" />
        </div>

        <!-- estado -->
        {{-- TO DO temporal, add estado after verify email --}}
        <div class="mt-4">
            <x-input-label for="estado" :value="__('estado')" />
            <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required />
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        {{-- TO DO already registered --}}
{{--         <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        {{-- TO DO add role --}}
    </form>
@endsection
{{-- </x-guest-layout> --}}

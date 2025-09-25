{{-- TO DO optimize, do it better --}}
@extends('layouts.app')
@section('title', 'Panel de usuario')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden p-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">Información de perfil</h2>
            <p class="text-gray-600 dark:text-gray-400 text-center mb-8">
                Actualiza la información de tu cuenta y la dirección de correo electrónico.
            </p>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nombre completo
                        </label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $user->name) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', $user->email) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="actividad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Actividad
                        </label>
                        <input type="text" id="actividad" name="actividad"
                            value="{{ old('actividad', $user->actividad) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('actividad')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cargo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Cargo
                        </label>
                        <input type="text" id="cargo" name="cargo"
                            value="{{ old('cargo', $user->cargo) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('cargo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="domicilio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Domicilio
                        </label>
                        <input type="text" id="domicilio" name="domicilio"
                            value="{{ old('domicilio', $user->domicilio) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('domicilio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="localidad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Localidad
                        </label>
                        <input type="text" id="localidad" name="localidad"
                            value="{{ old('localidad', $user->localidad) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('localidad')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Teléfono
                        </label>
                        <input type="text" id="telefono" name="telefono"
                            value="{{ old('telefono', $user->telefono) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('telefono')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cuit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            CUIT
                        </label>
                        <input type="text" id="cuit" name="cuit"
                            value="{{ old('cuit', $user->cuit) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('cuit')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Vínculo</p>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input id="integrante" name="vinculo" type="radio" value="Integrante de nuestra empresa" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <label for="integrante" class="ml-3 text-sm text-gray-700 dark:text-gray-300">
                                    Integrante de nuestra empresa
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="externo" name="vinculo" type="radio" value="Empresa externa" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <label for="externo" class="ml-3 text-sm text-gray-700 dark:text-gray-300">
                                    Empresa externa
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="cliente" name="vinculo" type="radio" value="Cliente o proveedor comercial" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <label for="cliente" class="ml-3 text-sm text-gray-700 dark:text-gray-300">
                                    Cliente o proveedor comercial
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="estudio" name="vinculo" type="radio" value="Cliente de un estudio profesional" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <label for="estudio" class="ml-3 text-sm text-gray-700 dark:text-gray-300">
                                    Cliente de un estudio profesional
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="otro" name="vinculo" type="radio" value="Otros" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <label for="otro" class="ml-3 text-sm text-gray-700 dark:text-gray-300">
                                    Otros
                                </label>
                            </div>
                        </div>
                        @error('vinculo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Actualizar Contraseña</h3>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nueva Contraseña
                            </label>
                            <input type="password" id="password" name="password"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Confirmar Contraseña
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('password_confirmation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-center space-x-4">
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Actualizar Usuario
                    </button>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-full shadow-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

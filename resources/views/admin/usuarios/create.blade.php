@extends('layouts.app')
@section('title', 'Crear usuario')

@section('content')

<div class="crear-main">

    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-2xl w-full space-y-8 p-8 bg-white rounded-lg shadow-xl">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Crear Nuevo Usuario
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Completa los datos para registrar un nuevo usuario.
                </p>
            </div>

            <!-- General Error Display (for non-field-specific errors, though less common with Request::validate) -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu envío.</span>
                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <!-- Nombre/Razón social -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre/Razón social</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('name') border-red-500 @enderror"
                        placeholder="Nombre o Razón Social">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Domicilio -->
                <div>
                    <label for="domicilio" class="block text-sm font-medium text-gray-700 mb-1">Domicilio</label>
                    <input type="text" id="domicilio" name="domicilio" value="{{ old('domicilio') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('domicilio') border-red-500 @enderror"
                        placeholder="Calle y número">
                    @error('domicilio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Localidad -->
                <div>
                    <label for="localidad" class="block text-sm font-medium text-gray-700 mb-1">Localidad</label>
                    <input type="text" id="localidad" name="localidad" placeholder="Ciudad y Provincia" value="{{ old('localidad') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('localidad') border-red-500 @enderror">
                    @error('localidad')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telefono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('telefono') border-red-500 @enderror"
                        placeholder="Ej: 1123456789">
                    @error('telefono')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CUIT -->
                <div>
                    <label for="cuit" class="block text-sm font-medium text-gray-700 mb-1">CUIT</label>
                    <input type="text" id="cuit" name="cuit" value="{{ old('cuit') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('cuit') border-red-500 @enderror"
                        placeholder="XX-XXXXXXXX-X">
                    @error('cuit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cargo -->
                <div>
                    <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
                    <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('cargo') border-red-500 @enderror"
                        placeholder="Ej: Gerente de Ventas">
                    @error('cargo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- E-MAIL -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-MAIL</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('email') border-red-500 @enderror"
                        placeholder="tu@ejemplo.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actividad -->
                <div>
                    <label for="actividad" class="block text-sm font-medium text-gray-700 mb-1">Actividad</label>
                    <input type="text" id="actividad" name="actividad" placeholder="Ej: Textil" value="{{ old('actividad') }}"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('actividad') border-red-500 @enderror">
                    @error('actividad')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vínculo -->
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Vínculo</h2>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="integrante" name="vinculo" value="Integrante de nuestra empresa"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{ old('vinculo') == 'Integrante de nuestra empresa' ? 'checked' : '' }}>
                            <label for="integrante" class="ml-2 block text-sm text-gray-900">Integrante de nuestra empresa</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="externo" name="vinculo" value="Empresa externa"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{ old('vinculo') == 'Empresa externa' ? 'checked' : '' }}>
                            <label for="externo" class="ml-2 block text-sm text-gray-900">Empresa externa</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="cliente" name="vinculo" value="Cliente o proveedor comercial"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{ old('vinculo') == 'Cliente o proveedor comercial' ? 'checked' : '' }}>
                            <label for="cliente" class="ml-2 block text-sm text-gray-900">Cliente o proveedor comercial</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="vinculo" id="estudio" value="Cliente de un estudio profesional"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{ old('vinculo') == 'Cliente de un estudio profesional' ? 'checked' : '' }}>
                            <label for="estudio" class="ml-2 block text-sm text-gray-900">Cliente de un estudio profesional</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="vinculo" id="otro" value="Otros"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{ old('vinculo') == 'Otros' ? 'checked' : '' }}>
                            <label for="otro" class="ml-2 block text-sm text-gray-900">Otros</label>
                        </div>
                    </div>
                    @error('vinculo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('password') border-red-500 @enderror"
                        placeholder="Mínimo 8 caracteres, mayúsculas, minúsculas, números, símbolos">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                @error('password_confirmation') border-red-500 @enderror"
                        placeholder="Repite tu contraseña">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enviar solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

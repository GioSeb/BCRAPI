{{-- resources/views/admin/usuarios/create.blade.php --}}
@extends('layouts.app')
@section('title', 'Crear Usuario')

@section('content')
<div class="bg-gray-900 py-12 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-2xl overflow-hidden">

            {{-- Form Header --}}
            <div class="p-8 border-b border-gray-700">
                <h2 class="text-3xl font-bold text-gray-100">
                    Crear Nuevo Usuario
                </h2>
                <p class="mt-2 text-sm text-gray-400">
                    Completa los datos para registrar un nuevo usuario en la plataforma.
                </p>
            </div>

            {{-- Form Body --}}
            <form class="space-y-8 p-8" action="{{ route('admin.usuarios.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-900/50 border border-red-500 text-red-300 px-4 py-3 rounded-lg" role="alert">
                        <strong class="font-bold">¡Oops! Hubo algunos problemas.</strong>
                        <ul class="mt-3 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Personal Details Section --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Datos Personales</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre/Razón social</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                                placeholder="Nombre o Razón Social">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="cuit" class="block text-sm font-medium text-gray-300 mb-1">CUIT</label>
                            <input type="text" id="cuit" name="cuit" value="{{ old('cuit') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('cuit') border-red-500 @enderror"
                                placeholder="XX-XXXXXXXX-X">
                            @error('cuit')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- Contact Information Section --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Información de Contacto</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="domicilio" class="block text-sm font-medium text-gray-300 mb-1">Domicilio</label>
                            <input type="text" id="domicilio" name="domicilio" value="{{ old('domicilio') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('domicilio') border-red-500 @enderror"
                                placeholder="Calle y número">
                            @error('domicilio')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="localidad" class="block text-sm font-medium text-gray-300 mb-1">Localidad</label>
                            <input type="text" id="localidad" name="localidad" value="{{ old('localidad') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('localidad') border-red-500 @enderror"
                                placeholder="Ciudad y Provincia">
                            @error('localidad')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-300 mb-1">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('telefono') border-red-500 @enderror"
                                placeholder="Ej: 1123456789">
                            @error('telefono')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- Account Details Section --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Datos de la Cuenta</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">E-MAIL</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                placeholder="tu@ejemplo.com">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Contraseña</label>
                            <input type="password" id="password" name="password"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                                placeholder="••••••••••">
                            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                         <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirmar Contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Repite tu contraseña" required>
                        </div>
                    </div>
                </div>

                 {{-- Other Details Section --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Otros Detalles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                       <div>
                            <label for="cargo" class="block text-sm font-medium text-gray-300 mb-1">Cargo</label>
                            <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('cargo') border-red-500 @enderror"
                                placeholder="Ej: Gerente de Ventas">
                            @error('cargo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="actividad" class="block text-sm font-medium text-gray-300 mb-1">Actividad</label>
                            <input type="text" id="actividad" name="actividad" value="{{ old('actividad') }}"
                                class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('actividad') border-red-500 @enderror"
                                placeholder="Ej: Textil">
                            @error('actividad')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>


                {{-- Vinculo Section --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-200 mb-3">Vínculo</h3>
                    <div class="space-y-3 p-4 bg-gray-900/50 rounded-lg border border-gray-700">
                        @foreach(['Integrante de nuestra empresa', 'Empresa externa', 'Cliente o proveedor comercial', 'Cliente de un estudio profesional', 'Otros'] as $vinculo)
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="vinculo" value="{{ $vinculo }}" class="form-radio h-5 w-5 text-indigo-500 bg-gray-700 border-gray-600 focus:ring-indigo-500 focus:ring-offset-gray-800"
                                {{ old('vinculo') == $vinculo ? 'checked' : '' }}>
                            <span class="text-gray-300">{{ $vinculo }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('vinculo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Submit Button --}}
                <div class="pt-6 border-t border-gray-700">
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500 transition-colors duration-300">
                        Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

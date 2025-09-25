@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<div class="bg-gray-900 py-12 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-2xl overflow-hidden">

            {{-- Form Header --}}
            <div class="p-8 border-b border-gray-700">
                <h2 class="text-3xl font-bold text-gray-100">
                    Editar Usuario
                </h2>
                <p class="mt-2 text-sm text-gray-400">
                    Actualiza los datos del usuario <span class="font-semibold text-indigo-400">{{ $usuario->name }}</span>.
                </p>
            </div>

            {{-- Form Body --}}
            <form class="space-y-8 p-8" action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Success and Error Messages --}}
                @if(session('success'))
                    <div class="bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded-lg" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

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

                {{-- Form Sections --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Datos Principales</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre Completo</label>
                            <input type="text" id="name" name="name" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" value="{{ old('name', $usuario->name) }}" required>
                            @error('name')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" value="{{ old('email', $usuario->email) }}" required>
                            @error('email')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="cuit" class="block text-sm font-medium text-gray-300 mb-1">CUIT</label>
                            <input type="text" id="cuit" name="cuit" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('cuit') border-red-500 @enderror" value="{{ old('cuit', $usuario->cuit) }}">
                            @error('cuit')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-200 border-b border-gray-700 pb-2">Información Adicional</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                         <div>
                            <label for="domicilio" class="block text-sm font-medium text-gray-300 mb-1">Domicilio</label>
                            <input type="text" id="domicilio" name="domicilio" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('domicilio') border-red-500 @enderror" value="{{ old('domicilio', $usuario->domicilio) }}">
                            @error('domicilio')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="localidad" class="block text-sm font-medium text-gray-300 mb-1">Localidad</label>
                            <input type="text" id="localidad" name="localidad" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('localidad') border-red-500 @enderror" value="{{ old('localidad', $usuario->localidad) }}">
                            @error('localidad')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-300 mb-1">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('telefono') border-red-500 @enderror" value="{{ old('telefono', $usuario->telefono) }}">
                            @error('telefono')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="cargo" class="block text-sm font-medium text-gray-300 mb-1">Cargo</label>
                            <input type="text" id="cargo" name="cargo" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('cargo') border-red-500 @enderror" value="{{ old('cargo', $usuario->cargo) }}">
                            @error('cargo')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="actividad" class="block text-sm font-medium text-gray-300 mb-1">Actividad</label>
                            <input type="text" id="actividad" name="actividad" class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('actividad') border-red-500 @enderror" value="{{ old('actividad', $usuario->actividad) }}">
                            @error('actividad')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="pt-6 border-t border-gray-700 flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.usuarios.index') }}" class="px-6 py-2 border border-gray-600 rounded-md text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-500 transition-colors duration-300">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500 transition-colors duration-300">
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

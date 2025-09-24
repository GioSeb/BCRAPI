@extends('layouts.app')
@section('title', 'Panel de usuarios')

@section('content')

<div class="bg-gray-900 min-h-screen text-white p-4 sm:p-6 lg:p-8">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-extrabold text-center mb-8">Administración de Usuarios</h1>

        {{-- Botón para agregar usuario --}}
        <div class="flex justify-start mb-8">
            <a href="{{ route('admin.usuarios.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium shadow-sm text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                <img src="{{asset('img/panel/plus.png')}}" alt="Agregar Usuario" class="h-5 w-5 mr-2"> {{-- 'filter invert' para que el ícono sea blanco --}}
                Agregar Usuario
            </a>
        </div>

        {{-- Mensajes de éxito o error --}}
        @if (session('success'))
            <div class="bg-green-700 border border-green-600 text-white px-4 py-3 rounded-md relative mb-4" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-300 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentNode.parentNode.style.display = 'none';">
                        <title>Cerrar</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-md relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentNode.parentNode.style.display = 'none';">
                        <title>Cerrar</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        {{-- Tabla de usuarios --}}
        @if($users->count() > 0)
            <div class="bg-gray-800 shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Fecha Creación</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nombre/Razón Social</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Correo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actividad</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Cargo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Vínculo</th>
{{--                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th> --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rol</th>
                                @if(Auth::user()->isMaster())
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Generado por</th>
                                @endif
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-medium">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->actividad ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->cargo ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->vinculo ?? 'N/A' }}</td>
{{--                                     <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($user->estado == 'Activo') bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100
                                            @elseif($user->estado == 'Pendiente') bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100
                                            @else bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100 @endif">
                                            {{ $user->estado ?? 'N/A' }}
                                        </span>
                                    </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->role->name ?? 'Sin Rol' }}</td>
                                    @if(Auth::user()->isMaster())
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $user->creator->name ?? 'Sistema' }}
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="text-indigo-500 hover:text-indigo-400 mr-4">Editar</a>
                                        <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario? Esta acción es irreversible.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $users->links() }}
            </div>

        @else
            <div class="text-center py-10 px-4 bg-gray-800 rounded-lg shadow-lg">
                <p class="text-xl text-gray-400">
                    @if(Auth::user()->isMaster())
                        No se encontraron usuarios en el sistema.
                    @else
                        Aún no has generado ningún usuario.
                    @endif
                </p>
            </div>
        @endif
    </div>
</div>

@endsection

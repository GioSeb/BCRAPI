@extends('layouts.app')
@section('title', 'Panel de usuarios')

@section('content')

<div class="main">
    <h1>Usuarios generados</h1>
    <div class="agregar-usuario mb-4"> {{-- Added margin-bottom for spacing --}}
        {{-- Link to the route for creating a new user --}}
        {{-- TO DO users create --}}
        <a href="{{ route('admin.users.create') }}" class="agregar-link">
            <img src="{{asset('img/panel/plus.png')}}" alt="agregar" class="agregar-plus w-4 h-4 mr-2"> {{-- Basic styling for image --}}
            Agregar Usuario
        </a>
    </div>

    {{-- Check if there are any users to display --}}
    @if($users->count() > 0)
        <table class="agregar-table w-full border-collapse border border-gray-300"> {{-- Added basic table styling --}}
            <thead>
                <tr class="bg-gray-100">
                    {{-- Match table headers with the data you display below --}}
                    <th class="border border-gray-300 px-2 py-1 text-left">Fecha Creación</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Nombre/Razón Social</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Correo</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Actividad</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Cargo</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Vínculo</th>
                    {{-- Removed Estado as it wasn't used below, add if needed --}}
                    <th class="border border-gray-300 px-2 py-1 text-left">Rol</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through the $users collection passed from the controller --}}
                {{-- Use $users (plural) as passed from controller, and $user (singular) for each item --}}
                @foreach ($users as $user)
                    <tr class="border border-gray-300 hover:bg-gray-50">
                        {{-- Access properties using object notation -> --}}
                        {{-- Format created_at date (ensure it's a Carbon instance) --}}
                        <td class="border border-gray-300 px-2 py-1">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->actividad ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->cargo ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->vinculo ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->role->name ?? 'Sin Rol' }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $user->estado ?? 'N/A' }}</td>
                            {{-- Link to edit user --}}
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:underline mr-2">Editar</a>

                            {{-- Form for deleting user --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                            {{-- Add other actions as needed --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Display pagination links if using paginate() in controller --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>

    @else
        <p class="mt-4 text-gray-600">No se encontraron usuarios.</p>
    @endif
</div>

@endsection


{{-- @extends('layouts.app')
@section('title', 'Panel de usuarios')

@section('content')

<div class="main">
    <h1>Usuarios generados</h1>
    <div class="agregar-usuario">
        <a href="#"><img src="{{asset('img/panel/plus.png')}}" alt="agregar">Agregar</a>
    </div>
    <table class="agregar-table">
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Nombre/Razon social</td>
                <td>Correo</td>
                <td>Actividad</td>
                <td>Cargo</td>
                <td>Vínculo</td>
                <td>Estado</td>
                <td>Acciones</td>
                <td>Rol</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $usuario)
                <tr>
                    <td>{{ \Carbon\Carbon::createFromFormat('Ym', $usuario['created_at'])->format('m/Y') }}</td>
                    <td>{{$usuario['name']}}</td>
                    <td>{{$usuario['email']}}</td>
                    <td>{{$usuario['actividad']}}</td>
                    <td>{{$usuario['cargo']}}</td>
                    <td>{{$usuario['estado']}}</td>
                    <td>{{$usuario['rol']}}</td>

                    <td><a href="#">Pedir baja</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
 --}}

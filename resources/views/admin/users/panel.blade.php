@extends('layouts.app')
@section('title', 'Panel de usuarios')

@section('content')

<div class="panel-main">
    <h1>Usuarios generados</h1>
    <div class="panel-agregar-usuario"> {{-- Added margin-bottom for spacing --}}
        {{-- Link to the route for creating a new user --}}
        {{-- TO DO users create --}}
        {{-- TO DO make all of parent div a button, not just the anchor --}}
        <a href="{{ route('admin.users.create') }}" class="panel-agregar-link">
            <img src="{{asset('img/panel/plus.png')}}" alt="agregar" class="panel-agregar-image">
            Agregar Usuario
        </a>
    </div>

    {{-- Check if there are any users to display --}}
    @if($users->count() > 0)
        <table class="agregar-table"> {{-- Added basic table styling --}}
            <thead>
                <tr class="bg-gray-100">
                    {{-- Match table headers with the data you display below --}}
                    <th class="">Fecha Creación</th>
                    <th class="">Nombre/Razón Social</th>
                    <th class="">Correo</th>
                    <th class="">Actividad</th>
                    <th class="">Cargo</th>
                    <th class="">Vínculo</th>
                    <th>Estado</th>
                    <th class="">Rol</th>
                    {{-- Conditionally show this column ONLY for Master users --}}
                    @if(Auth::user()->isMaster())
                        <th>Generado por</th>
                    @endif
                    <th class="">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through the $users collection passed from the controller --}}
                {{-- Use $users (plural) as passed from controller, and $user (singular) for each item --}}
                @foreach ($users as $user)
                    <tr class="">
                        {{-- Access properties using object notation -> --}}
                        {{-- Format created_at date (ensure it's a Carbon instance) --}}
                        <td class="">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="">{{ $user->name }}</td>
                        <td class="">{{ $user->email }}</td>
                        <td class="">{{ $user->actividad ?? 'N/A' }}</td>
                        <td class="">{{ $user->cargo ?? 'N/A' }}</td>
                        <td class="">{{ $user->vinculo ?? 'N/A' }}</td>
                        <td class="">{{ $user->estado ?? 'N/A' }}</td>
                        <td class="">{{ $user->role->name ?? 'Sin Rol' }}</td>
                        {{-- Conditionally show this data cell ONLY for Master users --}}
                        @if(Auth::user()->isMaster())
                            <td>
                                {{-- Use optional() or ?-> to prevent errors if creator is null --}}
                                {{-- For example, the first user might not have a creator --}}
                                {{ $user->creator->name ?? 'Sistema' }}
                            </td>
                        @endif
                        <td>
                            {{-- TO DO styles to editar and eliminar --}}
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="panel-usuarios-editar">Editar</a>

                            {{-- Form for deleting user --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="panel-form-eliminar" onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="panel-usuario-eliminar">Eliminar</button>
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
            @if(Auth::user()->isMaster())
                No se encontraron usuarios.
            @else
                Aún no has generado ningún usuario.
            @endif
    @endif
</div>

@endsection


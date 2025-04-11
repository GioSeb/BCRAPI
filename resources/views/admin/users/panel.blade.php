@extends('layouts.app')
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
                    {{-- TO DO talvez agregar mas acciones --}}
                    <td><a href="#">Pedir baja</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

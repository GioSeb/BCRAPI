{{-- TO DO optimize, do it better --}}
@extends('layouts.app')
@section('title', 'Panel de usuario')

@section('content')
<div class="form-container">
    <h1>@yield('title')</h1>

    {{-- This will display a generic success message if one exists --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- This will display validation errors if they exist --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ojo! Hay algunos problemas con los datos ingresados.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH') {{-- Method spoofing for the update action --}}

        <div class="form-group">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="actividad" class="form-label">Actividad</label>
            <input type="text" id="actividad" name="actividad" class="form-control" value="{{ old('actividad', $user->actividad) }}">
            @error('actividad')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', $user->cargo) }}">
            @error('cargo')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" id="domicilio" name="domicilio" class="form-control" value="{{ old('domicilio', $user->domicilio) }}">
            @error('domicilio')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="localidad" class="form-label">Localidad</label>
            <input type="text" id="localidad" name="localidad" class="form-control" value="{{ old('localidad', $user->localidad) }}">
            @error('localidad')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}">
            @error('telefono')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cuit" class="form-label">CUIT</label>
            <input type="text" id="cuit" name="cuit" class="form-control" value="{{ old('cuit', $user->cuit) }}">
            @error('cuit')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

{{-- TO DO fix label for vinculo radio for the label to be at the left of the radio --}}

        <div class="form-group">
            <h2>Vínculo</h2>
            <input type="radio" id="integrante" name="vinculo" value="Integrante de nuestra empresa">
            <label for="integrante" class="form-label">Integrante de nuestra empresa</label>
            <input type="radio" id="externo" name="vinculo" value="Empresa externa">
            <label for="externo" class="form-label">Empresa externa</label>
            <input type="radio" id="cliente" name="vinculo" value="Cliente o proveedor comercial">
            <label for="cliente" class="form-label">Cliente o proveedor comercial</label>
            <input type="radio" name="vinculo" id="estudio" value="Cliente de un estudio profesional">
            <label for="estudio" class="form-label">Cliende de un estudio profesional</label>
            <input type="radio" name="vinculo" id="otro" value="Otros">
            <label for="otro" class="form-label">Otros</label>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Nueva Contraseña</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            @error('password_confirmation')
                <div class="form-error">{{ $message }}</div>
            @enderror
    </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Crear usuario')

@section('content')

<div class="crear-main">
    <h1>SOLICITO SE HABILITE A: </h1>
    <br>
    <form class="crear-form" action="/crear/usuario" method="POST">
        @csrf
        <label class="crear-label" for="nombre">Nombre/Razón social</label>
        <input class="crear-input" type="text" id="nombre" name="name" value="{{old('name')}}">
        <label class="crear-label" for="domicilio">Domicilio</label>
        <input class="crear-input" type="text" id="domicilio" name="domicilio" value="{{old('domicilio')}}">
        <label class="crear-label" for="localidad">Localidad</label>
        <input class="crear-input" type="text" id="localidad" name="localidad" placeholder="Ciudad y Provincia" value="{{old('localidad')}}">
        <label class="crear-label" for="telefono">Telefono</label>
        <input class="crear-input" type="number" id="telefono" name="telefono" value="{{old('telefono')}}">
        <label class="crear-label" for="cuit">CUIT</label>
        <input class="crear-input" type="text" id="cuit" name="cuit" value="{{old('cuit')}}">
        <label class="crear-label" for="cargo">Cargo</label>
        <input class="crear-input" type="text" id="cargo" name="cargo" value="{{old('cargo')}}">
        <label class="crear-label" for="email">E-MAIL</label>
        <input class="crear-input" type="text" id="email" name="email" value="{{old('email')}}">
        <label class="crear-label" for="actividad">Actividad</label>
        <input class="crear-input" type="text" id="actividad" name="actividad" placeholder="Ej: Textil" value="{{old('actividad')}}">
        <h2>Vínculo</h2>
        <input type="radio" id="integrante" name="vinculo" value="Integrante de nuestra empresa">
        <label for="integrante">Integrante de nuestra empresa</label>
        <input type="radio" id="externo" name="vinculo" value="Empresa externa">
        <label for="externo">Empresa externa</label>
        <input type="radio" id="cliente" name="vinculo" value="Cliente o proveedor comercial">
        <label for="cliente">Cliente o proveedor comercial</label>
        <input type="radio" name="vinculo" id="estudio" value="Cliente de un estudio profesional">
        <label for="estudio">Cliende de un estudio profesional</label>
        <input type="radio" name="vinculo" id="otro" value="Otros">
        <label for="otro">Otros</label>

{{--    TO DO     <label for="notificarme">Notificarme a</label>
        <input type="email" name="notificarme" id="notificarme" class="crear-input"> --}}


        <button class="crear-button" type="submit">Enviar solicitud</button>
    </form>

</div>

@endsection

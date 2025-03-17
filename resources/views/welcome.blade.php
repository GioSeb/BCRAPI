@extends('layouts.app')
@section('title', 'Home')

@section('content')
<form action="{{ route('historial.fetch') }}" method="GET">
    <label for="cuit">CUIT:</label>
    <input type="text" name="cuit" id="cuit" required />
    <button type="submit">Enviar</button>
</form>
@endsection



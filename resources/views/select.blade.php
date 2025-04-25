@extends('layouts.app')
@section('title', 'Seleccionar')
{{-- resources/views/select.blade.php --}}

{{-- You can extend a layout if you have one --}}
{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<h1>Select Page</h1>

<p>Welcome, {{ Auth::user()->name }}!</p> {{-- Access user directly --}}
{{-- Or use the variable passed from the controller --}}
<p>Your email is: {{ $user->email }}</p>

<p>This page is only visible to logged-in users.</p>

{{-- Add your selection logic/content here --}}

{{-- Example Logout Form (if not in a layout) --}}
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Log Out</button>
</form>
{{-- @endsection --}}
@section('content')
    <div class="select-main">
        <div class="select-logo"><img src="{{asset('/img/logo.jpg')}}" alt=""></div>
        {{-- TO DO include working links --}}
        <div class="select-informe"><h1>NUEVA CONSULTA</h1></div>
    </div>

@endsection

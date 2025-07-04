<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>@yield('title', 'Nexor')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link href="/resources/css/styles3.css" rel="stylesheet"> --}}

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css',  'resources/css/styles3.css', 'resources/js/app.js']) --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </body>
</html>

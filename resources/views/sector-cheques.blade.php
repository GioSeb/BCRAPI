@extends('layouts.app')
@section('title', 'Sector de cheques')

@section('content')

        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-900 text-gray-200 font-sans antialiased">
        {{-- Main container card --}}
        <div class="w-full max-w-4xl p-8 bg-gray-800 rounded-3xl shadow-2xl">
            {{-- Header section with a title --}}
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl">
                    sector de cheques
                </h1>
            </div>

            {{-- Form for input with CSRF protection --}}
            <form action="{{ route('cheque.consult') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-12">
                @csrf

                {{-- Input group for Cheque Numero --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="cheque_numero" class="text-base font-medium text-gray-300 sm:w-1/3">
                        Numero de cheque
                    </label>
                    <div class="flex-grow">
                        <input
                            type="text"
                            id="cheque_numero"
                            name="cheque_numero"
                            placeholder="12345678"
                            class="mt-1 block w-full rounded-full border-0 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 py-2.5 px-5 shadow-sm sm:text-sm sm:leading-6"
                        >
                    </div>
                </div>

                {{-- Action button (e.g., Consultar or Aceptar) --}}
                <div class="flex justify-end items-center mt-6 sm:mt-0">
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-8 py-3 text-lg font-bold text-white bg-blue-600 rounded-full shadow-lg hover:bg-blue-700 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Aceptar
                    </button>
                </div>
            </form>

            {{-- Result/Text area --}}
            <div class="mt-12 bg-gray-700 rounded-2xl p-6 shadow-inner text-gray-300 text-sm leading-relaxed">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet enim id ex vestibulum tristique. Nunc imperdiet faucibus urna eget pulvinar. Mauris blandit auctor imperdiet. Donec eget lorem libero. Integer elementum arcu sed molestie feugiat. Maecenas a diam sem. Vestibulum ultricies, elit eget posuere pellentesque, justo metus malesuada massa, et finibus ex quam in dui. Ut eu tincidunt ipsum, non in venenatis antedana, id est finibus lectus, a varius enim lectus non sapien.
                </p>
                <p class="mt-4">
                    Aliquam id enim odio. Morbi efficitur dui vitae commodo convallis. Aliquam enim magna, eu scelerisque faucibus. Suspendisse euismod nec erat et facilisis. Nam rhoncus ipsum iaculis congue volutpat.
                </p>
                <p class="mt-4">
                    Phasellus posuere ullamcorper diam, ac pharetra ligula aliquet eget. Nunc vulputate nulla neque at feugiat. Nulla facilisi. Orci ultricies ante, et luctus ex quam at nisi. Aliquam id enim odio. Morbi efficitur dui vitae commodo convallis. Aliquam enim magna, eu scelerisque faucibus. Suspendisse euismod nec erat et facilisis. Nam rhoncus ipsum iaculis congue volutpat.
                </p>
            </div>
        </div>
    </div>

@endsection

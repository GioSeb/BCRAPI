<header class="bg-gray-800 shadow">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <img class="block h-8 w-auto" src="{{ asset('img/logo.jpg') }}" alt="Logo">
                </div>

                @auth
                    @if (Route::currentRouteName() !== 'index')
                        <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                            {{-- Inicio link --}}
                            <a href="{{route('dashboard')}}" class="
                                inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                                {{ Route::currentRouteName() === 'dashboard'
                                    ? 'border-indigo-400 text-white focus:outline-none focus:border-indigo-600'
                                    : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-400'
                                }}
                            ">Inicio</a>

                            <a href="{{route('nuevo-informe')}}" class="
                                inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                                {{ Route::currentRouteName() === 'nuevo-informe'
                                    ? 'border-indigo-400 text-white focus:outline-none focus:border-indigo-600'
                                    : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-400'
                                }}
                            ">Nueva consulta</a>

                            <a href="{{route('historial')}}" class="
                                inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                                {{ Route::currentRouteName() === 'historial'
                                    ? 'border-indigo-400 text-white focus:outline-none focus:border-indigo-600'
                                    : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-400'
                                }}
                            ">Historial</a>

                            <a href="{{route('seguimientos.index')}}" class="
                                inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                                {{ Route::currentRouteName() === 'seguimientos.index'
                                    ? 'border-indigo-400 text-white focus:outline-none focus:border-indigo-600'
                                    : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-400'
                                }}
                            ">Seguimientos</a>

                            <a href="{{route('admin.usuarios.index')}}" class="
                                inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                                {{ Route::currentRouteName() === 'admin.usuarios.index' && request()->segment(2) === 'usuarios' // More specific check
                                    ? 'border-indigo-400 text-white focus:outline-none focus:border-indigo-600'
                                    : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-400'
                                }}
                            ">Usuarios</a>
                        </div>
                    @endif
                @endauth
            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="flex items-center space-x-4">
                    @auth

                        <span class="text-white font-semibold">Hola, {{ Auth::user()->name }}</span>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Panel de Usuario
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Cerrar Sesión
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            {{-- Mobile menu button --}}
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>


    <div class="sm:hidden" id="mobile-menu">
        @auth
            @if (Route::currentRouteName() !== 'index')
                <div class="pt-2 pb-3 space-y-1">
                    {{-- Mobile Inicio link --}}
                    <a href="{{route('dashboard')}}" class="
                        block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::currentRouteName() === 'dashboard'
                            ? 'text-white bg-indigo-600'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                        }}
                    ">Inicio</a>

                    {{-- Mobile Historial link --}}
                    <a href="{{route('historial')}}" class="
                        block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::currentRouteName() === 'historial'
                            ? 'text-white bg-indigo-600'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                        }}
                    ">Historial</a>

                    {{-- Mobile Seguimientos link --}}
                    <a href="{{route('admin.usuarios.index')}}" class="
                        block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::currentRouteName() === 'admin.usuarios.index' && request()->segment(2) === 'usuarios'
                            ? 'text-white bg-indigo-600'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                        }}
                    ">Seguimientos</a>

                    {{-- Mobile Usuarios link --}}
                    <a href="{{route('admin.usuarios.index')}}" class="
                        block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::currentRouteName() === 'admin.usuarios.index' && request()->segment(2) === 'usuarios'
                            ? 'text-white bg-indigo-600'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                        }}
                    ">Usuarios</a>
                </div>
            @endif
        @endauth
        @auth
            <div class="pt-4 pb-3 border-t border-gray-700"> {{-- Adjusted border color --}}
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        {{-- User initial for dark background --}}
                        <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white text-xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div> {{-- Adjusted text color --}}
                        <div class="text-sm font-medium text-gray-300">{{ Auth::user()->email }}</div> {{-- Adjusted text color --}}
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    {{-- Mobile profile and logout links for dark background --}}
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Panel de Usuario</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</header>

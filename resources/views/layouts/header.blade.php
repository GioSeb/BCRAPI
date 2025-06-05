<header>
    <nav class="nav-container">
        <div class="px-container">
            <div class="flex-container">
                <div class="flex-items">
                    <div class="flex shrink-0 items-center">
                        <img class="logo" src="{{asset('img/logo.jpg')}}" alt="Logo">
                    </div>

                    <div class="space-between">
                        <div class="space-x-4">
                            <a href="#" class="active-link">Inicio</a>
                            <a href="#" class="nav-link">Consultas</a>
                            <a href="#" class="nav-link">Seguimientos</a>
                            <a href="#" class="nav-link">Usuarios</a>
                        </div>
                    </div>
                </div>

                <div class="space-between">
                    <div class="space-x-4">
                        @auth
                            {{-- User is logged in --}}
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-700 font-semibold">Hola, {{ Auth::user()->name }}</span>
                                <a href="{{ route('profile.edit') }}" class="btn-primary">
                                    Panel de Usuario
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn-danger">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
{{--                         @else

                            <a href="{{ route('login') }}" class="login-btn">Iniciar sesión</a>
                            <a href="{{ route('register') }}" class="register-btn">Registrarse</a> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

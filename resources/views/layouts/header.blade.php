{{-- TO DO change dynamically the log status --}}
<header>
    <nav class="nav-container">
        <div class="px-container">
            <div class="flex-container">
                <!-- Mobile menu button -->
                <div class="abs-left">
                    <button type="button" class="mobile-menu-btn" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Main content -->
                <div class="flex-items">
                    <!-- Logo -->
                    <div class="flex shrink-0 items-center">
                        <img class="logo" src="{{asset('img/logo.jpg')}}" alt="Logo">
                    </div>

                    <!-- Navigation links -->
                    <div class="space-between">
                        <div class="space-x-4">
                            <a href="#" class="active-link">Inicio</a>
                            <a href="#" class="nav-link">Consultas</a>
                            <a href="#" class="nav-link">Seguimientos</a>
                            <a href="#" class="nav-link">Usuarios</a>
                        </div>
                    </div>
                </div>

                <!-- Login/Register buttons -->
                <div class="space-between">
                    <div class="space-x-4">
                        <a href="#" class="login-btn">Iniciar sesión</a>
                        <a href="#" class="register-btn">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


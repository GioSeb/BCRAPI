@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <x-auth-session-status :status="session('status')" />
    <div class="inicio">
        <div class="inicio-info">
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quidem quod ad nulla ratione, aperiam porro voluptatem repellendus dolore.</h1>
            <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem reprehenderit dolorum, fuga porro obcaecati corporis velit praesentium non voluptatibus minus eligendi ipsa alias dignissimos corrupti autem saepe accusamus reiciendis totam.</h3>
            <button class="login-video">Ver video</button>
        </div>
        <div class="inicio-login">
            <div class="login-form">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label class="login-label" for="email">
                            {{ __('Su Email') }}
                        </label>

                        <input class="login-email"
                               id="email"
                               type="email"
                               name="email"
                               placeholder="nombre@dominio.com"
                               :value="old('email')"
                               required
                               autofocus
                               autocomplete="username" />

                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <label class="login-label" for="password">
                            {{ __('Su contraseña') }}
                        </label>

                        <input class="login-pass"
                               id="password"
                               type="password"
                               name="password"
                               placeholder="••••••••••"
                               required
                               autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div>
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="ms-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                            <a class="login-lost" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button class="login-button" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
                {{-- <a class="login-crear" href="{{ route('register') }}">Crear cuenta</a> --}} {{-- TO DO crear cuenta con autorizacion de admin o master --}}
            </div>
        </div>
    </div>
    {{-- TO DO informativo --}}
@endsection


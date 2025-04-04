@extends('layouts.app')
@section('title', 'Inicio')

<body>
    @section('content')
    <div class="inicio">
        <div class="inicio-info">
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quidem quod ad nulla ratione, aperiam porro voluptatem repellendus dolore.</h1>
            <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem reprehenderit dolorum, fuga porro obcaecati corporis velit praesentium non voluptatibus minus eligendi ipsa alias dignissimos corrupti autem saepe accusamus reiciendis totam.</h3>
            <button class="login-video">Ver video</button>
        </div>
        <div class="inicio-login">
            <div class="login-form">
                <form action="get">
                    <label class="login-label" for="email">Su Email</label>
                    <input class="login-email" type="text" name="email" id="" placeholder="nombre@dominio.com">
                    <label class="login-label" for="password">Su contraseña</label>
                    <input class="login-pass" type="password" name="password" id="" placeholder="••••••••••">
                    <button class="login-button" type="submit">Login</button>
                    <a class="login-lost" href="#"></a>
                    {{-- TO DO remember --}}
                </form>
                <a class="login-crear" href="#">Crear cuenta</a> {{-- TO DO crear cuenta --}}
            </div>
        </div>
    </div>
    {{-- TO DO informativo --}}
    @endsection

</body>

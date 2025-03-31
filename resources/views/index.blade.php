@extends('layouts.app')
@section('title', 'Inicio')

<body>
    @section('content')
    <div class="inicio">
        <div class="inicio-info">
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quidem quod ad nulla ratione, aperiam porro voluptatem repellendus dolore.</h1>
            <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem reprehenderit dolorum, fuga porro obcaecati corporis velit praesentium non voluptatibus minus eligendi ipsa alias dignissimos corrupti autem saepe accusamus reiciendis totam.</h3>
            <button>Ver video</button>
            <hr>
        </div>
        <div class="inicio-login">
            <div class="login-form">
                <form action="get">
                    <label for="email">Su Email</label>
                    <input type="text" name="email" id="" placeholder="nombre@dominio.com">
                    <label for="password">Su contraseña</label>
                    <input type="text" name="password" id="" placeholder="••••••••••">
                    <button type="submit">Login</button>
                    {{-- TO DO remember, lost password --}}
                </form>
                <a href="#">Crear cuenta</a> {{-- TO DO crear cuenta --}}
            </div>
        </div>
    </div>
    @endsection

</body>

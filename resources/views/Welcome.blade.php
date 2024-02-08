<!-- resources/views/landing.blade.php -->


@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Bienvenido a Nuestra Plataforma!</h1>
            <p class="lead">Reporta y sigue tus actividades diarias de desarrollo de manera eficiente.</p>
            <hr class="my-4">
            <p>Regístrate ahora para comenzar a usar nuestra plataforma.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Regístrate</a>
        </div>
    </div>
@endsection

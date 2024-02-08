
@section('content')
    <div class="container">
        <h1>Detalles de la Actividad</h1>

        <p><strong>Descripción:</strong> {{ $activity->description }}</p>

        <h2>Tiempos Registrados</h2>
        <ul class="list-group">
            @foreach($activity->times as $time)
                <li class="list-group-item">
                    {{ $time->date }} - {{ $time->hours }} Horas
                </li>
            @endforeach
        </ul>

        <a href="{{ route('activities.times.create', $activity) }}" class="btn btn-primary mt-3">Agregar Tiempo</a>
    </div>
@endsection

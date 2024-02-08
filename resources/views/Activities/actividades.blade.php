@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Actividades</h1>
        
        <ul class="list-group">
            @foreach($activities as $activity)
                <li class="list-group-item">
                    <a href="{{ route('activities.show', $activity) }}">{{ $activity->description }}</a>
                </li>
            @endforeach
        </ul>
        
        <a href="{{ route('activities.create') }}" class="btn btn-primary mt-3">Crear Nueva Actividad</a>
    </div>
@endsection

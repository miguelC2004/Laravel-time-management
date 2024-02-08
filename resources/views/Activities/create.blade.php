
@section('content')
    <div class="container">
        <h1>Crear Nueva Actividad</h1>

        <form action="{{ route('activities.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Descripción de la Actividad</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Actividad</button>
        </form>
    </div>
@endsection

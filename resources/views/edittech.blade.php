@extends('layouts.app')

@section('content')
    <div class="container vh-100">

        {{-- Titolo che cambia in base al tipo di risorsa --}}
        <h1 class="mt-5">Modifica {{ $resourceType === 'technology' ? 'Tecnologia' : 'Tipo' }}</h1>

        <form action="{{ route('admin.technologies.update', $resource->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome Tecnologia:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $resource->name }}" required>
            </div>
            
            {{-- Button Aggiorna --}}
            <button type="submit" class="btn btn-success mt-3 hoverable">Aggiorna</button>

            {{-- Button Annulla --}}
            <a href="{{ Route::currentRouteName() == 'admin.technologies.edit' ? route('admin.technologies.index') : route('admin.types.index') }}"
            class="btn btn-secondary mt-3 hoverable">Annulla</a>

        </form>

    </div>
@endsection

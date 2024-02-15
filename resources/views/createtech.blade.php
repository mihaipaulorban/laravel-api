@extends('layouts.app')

@section('content')
    <div class="container vh-100">

        {{-- Titolo chee cambia in base al tipo di risorsa --}}
        <h1 class="mt-5">Aggiungi {{ $resourceType === 'technology' ? 'Tecnologia' : 'Tipo' }}</h1>

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">{{ $resourceType === 'technology' ? 'Nome Tecnologia' : 'Nome Tipo' }}:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            {{-- Bottone Crea --}}
            <button type="submit" class="btn btn-success mt-3 hoverable">Crea</button>

            {{-- Bottone Annulla --}}
            <a href="{{ Route::currentRouteName() == 'admin.technologies.create' ? route('admin.technologies.index') : route('admin.types.index') }}"
                class="btn btn-secondary mt-3 hoverable">Annulla</a>

        </form>

    </div>
@endsection

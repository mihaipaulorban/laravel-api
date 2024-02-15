@extends('layouts.app')

@section('content')
    <div class="container mt-5 vh-100">
        <h2 class="mb-5">Modifica Progetto</h2>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Campi del form --}}
            <div class="mb-3">
                <label for="title" class="form-label font-weight-bold">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label font-weight-bold">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
            </div>
            {{-- Selezione del tipo --}}
            <div class="mb-3">
                <label for="type_id" class="form-label font-weight-bold">Tipo di Progetto</label>
                <select class="form-control" id="type_id" name="type_id">
                    <option value="">Seleziona un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ (isset($project) && $project->type_id == $type->id) ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">

                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                            id="technology_{{ $technology->id }}" name="technologies[]"
                            @if ($project->technologies->contains($technology)) checked @endif>

                        <label class="form-check-label" for="technology_{{ $technology->id }}">

                            {{ $technology->name }}

                        </label>

                    </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary hoverable">Aggiorna</button>
        </form>
    </div>
@endsection

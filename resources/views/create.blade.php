@extends('layouts.app')

@section('content')
    <div class="container mt-5 vh-100">
        <h2 class="mb-5">Aggiungi Progetto</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            {{-- Campi del form --}}
            <div class="mb-3">
                <label for="title" class="form-label font-weight-bold">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label font-weight-bold">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
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
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="technologies[]"
                                value="{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
</div>

            <button type="submit" class="btn btn-success hoverable">Crea</button>
        </form>
    </div>
@endsection
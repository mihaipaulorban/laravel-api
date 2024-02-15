@extends('layouts.app')

@section('content')
    <div class="container mt-4 vh-100">

        {{-- Titolo --}}
        <h2>Progetti</h2>

        {{-- Messaggi di feedback --}}
        @if (session('created'))
            <div class="alert alert-success mt-4">
                {{ session('created') }}
            </div>
        @endif

        @if (session('updated'))
            <div class="alert alert-info mt-4">
                {{ session('updated') }}
            </div>
        @endif

        @if (session('deleted'))
            <div class="alert alert-warning mt-4">
                {{ session('deleted') }}
            </div>
        @endif

        {{-- Pulsante crea nuovo progetto --}}
        <a href="{{ route('admin.projects.create') }}" class="hoverable btn btn-success my-4">
            Crea Nuovo Progetto
        </a>

        {{-- Pulsanti per gestire le categorie --}}
        <a href="{{ route('admin.types.index') }}" class="hoverable btn btn-primary my-4">
            Gestione Tipi
        </a>
        {{-- Pulsanti per gestire le tecnologie --}}
        <a href="{{ route('admin.technologies.index') }}" class="hoverable btn btn-primary my-4">
            Gestione Tecnologie
        </a>

        {{-- Tabella --}}
        <table class="table table-borderless table-hover">

            {{-- Intestazione --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Info</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </tr>
            </thead>

            {{-- Corpo --}}
            <tbody>
                @foreach ($projects as $project)
                    {{-- Righe --}}
                    <tr>

                        {{-- Colonne --}}
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>

                        {{-- Colonna tipo progetto --}}
                        @if ($project->type_id == 1)
                            <td>
                                <span class="badge text-bg-success">
                                    {{ $project->type->name ?? 'Nessun tipo' }}
                                </span>
                            </td>
                        @elseif($project->type_id == 2)
                            <td>
                                <span class="badge text-bg-warning">
                                    {{ $project->type->name ?? 'Nessun tipo' }}
                                </span>
                            </td>
                        @elseif($project->type_id == 3)
                            <td>
                                <span class="badge text-bg-info">
                                    {{ $project->type->name ?? 'Nessun tipo' }}
                                </span>
                            </td>
                        @else
                            <td>{{ $project->type->name ?? 'Nessun tipo' }}</td>
                        @endif
                        {{-- Colonna info --}}
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}"
                                class="btn btn-info hoverable">Info</a>
                        </td>
                        {{-- Colonna modifica --}}
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary hoverable">
                                Modifica
                            </a>
                        </td>

                        {{-- Colonna elimina --}}
                        <td>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger hoverable" type="submit"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                    Elimina
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

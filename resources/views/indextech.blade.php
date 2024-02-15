@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Tecnologie</h1>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">Aggiungi Nuova Tecnologia</a>

    {{-- Tabella tecnologie --}}
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            {{-- Lista di tecnologie --}}
            @foreach ($technologies as $technology)
            <tr>
                <td>{{ $technology->name }}</td>
                <td>

                    {{-- Bottone per modificare --}}
                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning hoverable">Modifica</a>

                    {{-- Bottone per eliminare --}}
                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
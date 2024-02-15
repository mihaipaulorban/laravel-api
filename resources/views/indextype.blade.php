@extends('layouts.app')

@section('content')
<div class="container vh-100">
    <h1>Gestione Tipi</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Aggiungi Tipo</a>

    {{-- Tabella Tipi --}}
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>

            {{-- Lista di tipi --}}
            @foreach ($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    {{-- Bottone Modifica --}}
                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning hoverable">Modifica</a>

                    {{-- Bottone Elimina --}}
                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questo tipo?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
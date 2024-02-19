@extends('layouts.app')

@section('content')
    <div class="vh-100 text-center">

        {{-- titolo --}}
        <h1 class="mt-5 mb-2">{{ $project->title }}</h1>

        {{-- Descrizione --}}
        <p>{{ $project->description }}</p>

        {{-- Immagine --}}
        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine del progetto">
        @endif

        {{-- Lista tecnoologie in stile tag --}}
        <ul class="list-group">
            <div class="d-flex justify-content-center">
                @foreach ($project->technologies as $technology)
                    <li class="d-inline mx-2 badge rounded-pill text-bg-dark">{{ $technology->name }}</li>
                @endforeach
            </div>

        </ul>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

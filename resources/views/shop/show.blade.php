@extends('shop.layout')

@section('title', $article->designation)

@section('content')
<main class="container">
    <a class="btn btn-link px-0 mb-3" href="{{ route('shop.index') }}">Retour aux articles</a>

    <article>
        <h1>{{ $article->designation }}</h1>
        <p class="text-muted">Référence : {{ $article->reference }}</p>
        <p>{{ $article->description }}</p>
        <p class="fs-4 fw-bold">{{ $article->prix }} TND</p>
        <p>Stock disponible : {{ $article->stock }}</p>
    </article>
</main>
@endsection

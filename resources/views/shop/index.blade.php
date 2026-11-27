@extends('shop.layout')

@section('title', 'Liste des articles')

@section('content')
<main class="container">
    <h1 class="mb-4">Liste des articles</h1>

    @forelse ($articles as $article)
        <article class="card mb-3">
            <div class="card-body">
                <h2 class="h5">{{ $article->designation }}</h2>
                <p class="mb-2">{{ $article->prix }} TND</p>
                <a class="btn btn-primary" href="{{ route('shop.show', ['slug' => $article->slug, 'id' => $article->id]) }}">
                    Voir l'article
                </a>
            </div>
        </article>
    @empty
        <p class="alert alert-info">Aucun article à afficher.</p>
    @endforelse

    {{ $articles->links() }}
</main>
@endsection

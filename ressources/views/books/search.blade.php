@extends('layouts.app', [
    'title' => 'Recherche de livres',
    'breadcrumbs' => [
        ['label' => 'Catalogue', 'url' => route('books.index')],
        ['label' => 'Recherche', 'url' => null]
    ]
])

@section('content')
<div class="container">
    {{-- Formulaire de recherche --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2><i class="fas fa-search"></i> Recherche de Livres</h2>
                    <form action="{{ route('books.search') }}" method="GET" class="mt-3">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-lg" 
                                   placeholder="Rechercher par titre, auteur ou catégorie..."
                                   value="{{ $query }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Rechercher
                            </button>
                        </div>
                        @if($query)
                        <div class="mt-2">
                            <a href="{{ route('books.search') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times"></i> Effacer la recherche
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Résultats --}}
    @if($query)
    <div class="row mb-4">
        <div class="col-12">
            <h3>
                Résultats pour "{{ $query }}"
                <span class="badge bg-secondary">{{ $totalResults }} résultat{{ $totalResults > 1 ? 's' : '' }}</span>
            </h3>
        </div>
    </div>

    <div class="row">
        @forelse($results as $book)
        <div class="col-md-6 col-lg-4 mb-4">
            <x-book-card :book="$book" :show-details="true" />
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Aucun résultat trouvé</strong> pour "{{ $query }}".
                <hr>
                Suggestions :
                <ul class="mb-0">
                    <li>Vérifiez l'orthographe</li>
                    <li>Utilisez des termes plus généraux</li>
                    <li>Essayez de rechercher par auteur ou catégorie</li>
                </ul>
            </div>
        </div>
        @endforelse
    </div>
    @else
    {{-- Page de recherche vide --}}
    <div class="row">
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4>Rechercher dans notre catalogue</h4>
                <p class="text-muted">
                    Utilisez le formulaire ci-dessus pour rechercher des livres par titre, auteur ou catégorie.
                </p>
                <a href="{{ route('books.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-books"></i> Voir tout le catalogue
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@extends('layouts.app', [
    'title' => 'Catalogue des livres',
    'breadcrumbs' => [
        ['label' => 'Catalogue', 'url' => null]
    ]
])

@section('content')
<div class="container">
    {{-- En-tête avec statistiques --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1>
                        <i class="fas fa-books"></i>
                        Catalogue des Livres
                    </h1>
                    <p class="text-muted">
                        {{ $stats['total'] }} livres • {{ $stats['available'] }} disponibles • {{ $stats['categories'] }} catégories
                    </p>
                </div>
                <div>
                    <a href="{{ route('books.search') }}" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i> Recherche avancée
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Liste des livres --}}
    <div class="row">
        @forelse($books as $book)
        <div class="col-md-6 col-lg-4 mb-4">
            <x-book-card :book="$book" :show-details="true" />
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i>
                Aucun livre n'est disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    {{-- Message informatif --}}
    @if(count($books) > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-light">
                <i class="fas fa-lightbulb"></i>
                <strong>Information :</strong> 
                Ces données sont statiques pour la Séance 1. 
                En Séance 2, nous connecterons une vraie base de données PostgreSQL !
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('title', $book['title'])

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('books.index') }}">Catalogue</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ $book['title'] }}</li>
@endsection

@section('content')
<div class="container">
    <!-- En-tête avec bouton retour -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Retour au catalogue
            </a>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="row">
        <!-- Colonne gauche : Image et actions -->
        <div class="col-lg-4">
            <div class="card sticky-top">
                <!-- Image de couverture -->
                <img src="{{ $book['cover'] }}" class="card-img-top" alt="Couverture de {{ $book['title'] }}" style="height: 400px; object-fit: cover;">
                
                <div class="card-body">
                    <!-- Statut de disponibilité -->
                    <div class="text-center mb-3">
                        @if($book['available'])
                            <span class="badge bg-success fs-6 px-3 py-2">
                                <i class="fas fa-check-circle me-2"></i>Disponible
                            </span>
                        @else
                            <span class="badge bg-danger fs-6 px-3 py-2">
                                <i class="fas fa-clock me-2"></i>Emprunté
                            </span>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="d-grid gap-2">
                        @if($book['available'])
                            <button class="btn btn-success btn-lg" disabled>
                                <i class="fas fa-bookmark me-2"></i>Emprunter ce livre
                                <small class="d-block mt-1">Disponible en Séance 4</small>
                            </button>
                        @else
                            <button class="btn btn-outline-secondary btn-lg" disabled>
                                <i class="fas fa-clock me-2"></i>Livre indisponible
                            </button>
                        @endif
                        
                        <button class="btn btn-outline-primary" disabled>
                            <i class="fas fa-heart me-2"></i>Ajouter aux favoris
                            <small class="d-block">Séance 4</small>
                        </button>
                        
                        <button class="btn btn-outline-info" disabled>
                            <i class="fas fa-share-alt me-2"></i>Partager
                            <small class="d-block">Séance 4</small>
                        </button>
                    </div>

                    <!-- QR Code (séance 7) -->
                    <div class="mt-3 text-center">
                        <div class="border rounded p-3 bg-light">
                            <div style="width: 100px; height: 100px; background: #ddd; margin: 0 auto; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                <i class="fas fa-qrcode fa-2x text-muted"></i>
                            </div>
                            <small class="text-muted d-block mt-2">
                                QR Code disponible en Séance 7
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne droite : Informations détaillées -->
        <div class="col-lg-8">
            <!-- Titre et informations principales -->
            <div class="mb-4">
                <h1 class="display-5">{{ $book['title'] }}</h1>
                <p class="lead text-muted">
                    <i class="fas fa-user me-2"></i>par {{ $book['author'] }}
                </p>
            </div>

            <!-- Informations techniques -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-info-circle me-2"></i>Informations
                            </h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-5">ISBN :</dt>
                                <dd class="col-7">{{ $book['isbn'] }}</dd>
                                
                                <dt class="col-5">Publication :</dt>
                                <dd class="col-7">{{ $book['publication_year'] }}</dd>
                                
                                <dt class="col-5">Pages :</dt>
                                <dd class="col-7">{{ $book['pages'] }} pages</dd>
                                
                                <dt class="col-5">Catégorie :</dt>
                                <dd class="col-7">
                                    <span class="badge bg-secondary">{{ $book['category'] }}</span>
                                </dd>
                                
                                <dt class="col-5">Langue :</dt>
                                <dd class="col-7">{{ $book['language'] }}</dd>
                                
                                <dt class="col-5">Éditeur :</dt>
                                <dd class="col-7">{{ $book['publisher'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <!-- Statistiques (simulées pour la démo) -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-chart-bar me-2"></i>Statistiques
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="border-end">
                                        <div class="h5 mb-0 text-primary">4.2</div>
                                        <small class="text-muted">Note moyenne</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-end">
                                        <div class="h5 mb-0 text-success">12</div>
                                        <small class="text-muted">Emprunts</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="h5 mb-0 text-info">8</div>
                                    <small class="text-muted">Avis</small>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-2 text-center">
                                <i class="fas fa-info-circle me-1"></i>
                                Données temps réel en Séance 5
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-align-left me-2"></i>Description
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $book['description'] }}</p>
                </div>
            </div>

            <!-- Livres similaires -->
            @if(count($relatedBooks) > 0)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-bookmark me-2"></i>Livres similaires
                            <small class="text-muted">({{ $book['category'] }})</small>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($relatedBooks as $relatedBook)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ $relatedBook['cover'] }}" class="card-img-top" alt="{{ $relatedBook['title'] }}" style="height: 150px; object-fit: cover;">
                                        <div class="card-body p-2">
                                            <h6 class="card-title small">{{ Str::limit($relatedBook['title'], 30) }}</h6>
                                            <p class="card-text small text-muted">{{ $relatedBook['author'] }}</p>
                                            <a href="{{ route('books.show', $relatedBook['id']) }}" class="btn btn-sm btn-outline-primary">
                                                Voir détails
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section commentaires (pour les séances futures) -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-comments me-2"></i>Avis et commentaires
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="py-4">
                        <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                        <h6>Système de commentaires</h6>
                        <p class="text-muted">
                            Les avis utilisateurs seront disponibles à partir de la Séance 4
                            (avec système d'authentification).
                        </p>
                        <button class="btn btn-outline-primary" disabled>
                            <i class="fas fa-star me-2"></i>Donner mon avis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation d'entrée pour les cartes
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        console.log('📖 Livre affiché:', {
            id: {{ $book['id'] }},
            title: '{{ $book['title'] }}',
            author: '{{ $book['author'] }}',
            available: {{ $book['available'] ? 'true' : 'false' }}
        });
    });
</script>
@endpush

@endsection
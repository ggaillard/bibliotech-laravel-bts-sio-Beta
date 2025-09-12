@extends('layouts.app')

@section('title', 'Recherche de Livres')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Recherche</li>
@endsection

@section('content')
<div class="container">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1><i class="fas fa-search me-3"></i>Recherche de Livres</h1>
            <p class="text-muted">Trouvez rapidement le livre que vous cherchez</p>
        </div>
    </div>

    <!-- Formulaire de recherche principal -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-primary">
                <div class="card-body">
                    <form action="{{ route('books.search') }}" method="GET" id="searchForm">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-search"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="query" 
                                value="{{ $query ?? '' }}" 
                                placeholder="Titre du livre, auteur, mot-clé..."
                                autofocus
                            >
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search me-2"></i>Rechercher
                            </button>
                        </div>
                    </form>
                    
                    <!-- Suggestions de recherche -->
                    <div class="mt-3">
                        <small class="text-muted">Suggestions :</small>
                        <div class="mt-2">
                            <a href="{{ route('books.search', 'laravel') }}" class="badge bg-light text-primary me-2 mb-1 text-decoration-none">Laravel</a>
                            <a href="{{ route('books.search', 'docker') }}" class="badge bg-light text-primary me-2 mb-1 text-decoration-none">Docker</a>
                            <a href="{{ route('books.search', 'php') }}" class="badge bg-light text-primary me-2 mb-1 text-decoration-none">PHP</a>
                            <a href="{{ route('books.search', 'jean') }}" class="badge bg-light text-primary me-2 mb-1 text-decoration-none">Jean Dupont</a>
                            <a href="{{ route('books.search', 'base') }}" class="badge bg-light text-primary me-2 mb-1 text-decoration-none">Base de données</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres avancés (pour les séances futures) -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-filter me-2"></i>Filtres avancés
                        <small class="text-muted">(Disponible en Séance 6)</small>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Catégorie</label>
                            <select class="form-select" disabled>
                                <option>Toutes les catégories</option>
                                <option>Développement Web</option>
                                <option>DevOps</option>
                                <option>Architecture</option>
                                <option>Programmation</option>
                                <option>Base de Données</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Auteur</label>
                            <select class="form-select" disabled>
                                <option>Tous les auteurs</option>
                                <option>Jean Dupont</option>
                                <option>Marie Martin</option>
                                <option>Paul Durand</option>
                                <option>Sophie Bernard</option>
                                <option>Luc Moreau</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Disponibilité</label>
                            <select class="form-select" disabled>
                                <option>Tous</option>
                                <option>Disponible</option>
                                <option>Emprunté</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Année</label>
                            <select class="form-select" disabled>
                                <option>Toutes les années</option>
                                <option>2024</option>
                                <option>2023</option>
                                <option>2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-outline-primary me-2" disabled>
                                <i class="fas fa-search me-2"></i>Recherche avancée
                            </button>
                            <button class="btn btn-outline-secondary" disabled>
                                <i class="fas fa-undo me-2"></i>Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Résultats de recherche -->
    <div class="row">
        <div class="col-12">
            @if(isset($results))
                <!-- Message de résultats -->
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>{{ $message }}
                </div>

                @if(count($results) > 0)
                    <!-- Liste des résultats -->
                    <div class="row" id="searchResults">
                        @foreach($results as $book)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card book-card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $book['title'] }}
                                            @if(stripos($book['title'], $query) !== false)
                                                <i class="fas fa-bullseye text-warning ms-1" title="Correspondance dans le titre"></i>
                                            @endif
                                        </h5>
                                        <p class="text-muted">
                                            <i class="fas fa-user me-1"></i>{{ $book['author'] }}
                                            @if(stripos($book['author'], $query) !== false)
                                                <i class="fas fa-bullseye text-warning ms-1" title="Correspondance dans l'auteur"></i>
                                            @endif
                                        </p>
                                        <div class="mt-3">
                                            <a href="{{ route('books.show', $book['id']) }}" class="btn btn-primary">
                                                <i class="fas fa-eye me-2"></i>Voir les détails
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination simulée -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <nav aria-label="Pagination des résultats">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <span class="page-link">Précédent</span>
                                    </li>
                                    <li class="page-item active">
                                        <span class="page-link">1</span>
                                    </li>
                                    <li class="page-item disabled">
                                        <span class="page-link">Suivant</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                @else
                    <!-- Aucun résultat -->
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>Aucun livre trouvé</h4>
                        <p class="text-muted">
                            Essayez avec d'autres mots-clés ou consultez notre 
                            <a href="{{ route('books.index') }}">catalogue complet</a>.
                        </p>
                        
                        <div class="mt-4">
                            <h6>Suggestions :</h6>
                            <div>
                                <a href="{{ route('books.search', 'laravel') }}" class="btn btn-outline-primary btn-sm me-2">Laravel</a>
                                <a href="{{ route('books.search', 'docker') }}" class="btn btn-outline-primary btn-sm me-2">Docker</a>
                                <a href="{{ route('books.search', 'php') }}" class="btn btn-outline-primary btn-sm">PHP</a>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <!-- Page de recherche vide -->
                <div class="text-center py-5">
                    <i class="fas fa-search fa-4x text-primary mb-4"></i>
                    <h3>Commencez votre recherche</h3>
                    <p class="text-muted lead">
                        Utilisez le formulaire ci-dessus pour rechercher dans notre collection de livres.
                    </p>
                    
                    <!-- Recherches populaires -->
                    <div class="mt-4">
                        <h6>Recherches populaires :</h6>
                        <div class="mt-3">
                            <a href="{{ route('books.search', 'laravel') }}" class="btn btn-outline-primary me-2 mb-2">
                                <i class="fas fa-fire me-1"></i>Laravel
                            </a>
                            <a href="{{ route('books.search', 'docker') }}" class="btn btn-outline-success me-2 mb-2">
                                <i class="fas fa-fire me-1"></i>Docker
                            </a>
                            <a href="{{ route('books.search', 'architecture') }}" class="btn btn-outline-info me-2 mb-2">
                                <i class="fas fa-fire me-1"></i>Architecture
                            </a>
                            <a href="{{ route('books.search', 'php') }}" class="btn btn-outline-warning mb-2">
                                <i class="fas fa-fire me-1"></i>PHP
                            </a>
                        </div>
                    </div>

                    <!-- Lien vers le catalogue -->
                    <div class="mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-books me-2"></i>Voir tout le catalogue
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        const searchInput = searchForm.querySelector('input[name="query"]');
        
        // Auto-focus sur le champ de recherche si pas de résultats
        @if(!isset($query) || empty($query))
            searchInput.focus();
        @endif

        // Animation pour les résultats de recherche
        @if(isset($results) && count($results) > 0)
            const resultCards = document.querySelectorAll('#searchResults .card');
            resultCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        @endif

        // Surlignage des termes de recherche (basique)
        @if(isset($query) && !empty($query))
            const query = '{{ $query }}';
            const highlightTerm = (text, term) => {
                const regex = new RegExp(`(${term})`, 'gi');
                return text.replace(regex, '<mark>$1</mark>');
            };

            document.querySelectorAll('.card-title, .text-muted').forEach(element => {
                if (element.textContent.toLowerCase().includes(query.toLowerCase())) {
                    element.innerHTML = highlightTerm(element.innerHTML, query);
                }
            });
        @endif

        // Log pour le debug
        console.log('🔍 Page de recherche chargée', {
            query: '{{ $query ?? "null" }}',
            results: {{ isset($results) ? count($results) : 0 }},
            hasFilters: false // Séance 6
        });
    });
</script>
@endpush

@endsection
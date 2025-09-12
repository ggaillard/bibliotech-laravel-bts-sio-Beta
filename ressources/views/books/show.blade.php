@extends('layouts.app')

@section('title', 'À propos de BiblioTech')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">À propos</li>
@endsection

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="hero-section rounded p-5">
                <h1 class="display-4"><i class="fas fa-book-open me-3"></i>BiblioTech</h1>
                <p class="lead">Système de gestion de bibliothèque moderne</p>
                <p>Version {{ $version }} - Formation BTS SIO SLAM</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Colonne principale -->
        <div class="col-lg-8">
            <!-- À propos du projet -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-info-circle me-2"></i>À propos du projet</h4>
                </div>
                <div class="card-body">
                    <p class="lead">
                        BiblioTech est une application de démonstration développée dans le cadre de la formation 
                        <strong>Laravel pour BTS SIO SLAM</strong>.
                    </p>
                    
                    <p>
                        Cette application illustre les concepts fondamentaux du développement web moderne avec Laravel,
                        en suivant une approche pédagogique progressive sur 8 séances de 3 heures chacune.
                    </p>

                    <p>
                        L'objectif est de faire découvrir aux étudiants les bonnes pratiques du développement web
                        professionnel, de l'architecture MVC classique jusqu'aux microservices modernes.
                    </p>
                </div>
            </div>

            <!-- Objectifs pédagogiques -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-target me-2"></i>Objectifs pédagogiques</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">Compétences techniques :</h6>
                            <ul>
                                <li>Maîtrise du framework Laravel</li>
                                <li>Architecture MVC et bonnes pratiques</li>
                                <li>Gestion de base de données avec Eloquent</li>
                                <li>Développement d'interfaces utilisateur</li>
                                <li>Environnement Docker et conteneurisation</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">Compétences professionnelles :</h6>
                            <ul>
                                <li>Travail en équipe avec Git</li>
                                <li>Tests automatisés et qualité de code</li>
                                <li>CI/CD et déploiement automatique</li>
                                <li>Veille technologique</li>
                                <li>Documentation technique</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fonctionnalités -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-cog me-2"></i>Fonctionnalités</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-success">✅ Disponibles (Séance 1) :</h6>
                            <ul>
                                <li><i class="fas fa-check text-success me-1"></i> Catalogue de livres</li>
                                <li><i class="fas fa-check text-success me-1"></i> Recherche simple</li>
                                <li><i class="fas fa-check text-success me-1"></i> Pages de détail</li>
                                <li><i class="fas fa-check text-success me-1"></i> Interface responsive</li>
                                <li><i class="fas fa-check text-success me-1"></i> Navigation intuitive</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-warning">🔒 À venir (Séances 2-8) :</h6>
                            <ul>
                                <li><i class="fas fa-clock text-warning me-1"></i> Gestion des emprunts</li>
                                <li><i class="fas fa-clock text-warning me-1"></i> Système d'authentification</li>
                                <li><i class="fas fa-clock text-warning me-1"></i> Notifications temps réel</li>
                                <li><i class="fas fa-clock text-warning me-1"></i> Gamification</li>
                                <li><i class="fas fa-clock text-warning me-1"></i> Intelligence artificielle</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Architecture technique -->
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-sitemap me-2"></i>Architecture technique</h4>
                </div>
                <div class="card-body">
                    <p>BiblioTech suit une <strong>évolution architecturale progressive</strong> :</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-white text-center">
                                    <h6 class="mb-0">Séances 1-4 : Monolithe</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="mb-0 small">
                                        <li>Application Laravel unique</li>
                                        <li>Base de données centralisée</li>
                                        <li>Développement rapide</li>
                                        <li>Debugging facilité</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white text-center">
                                    <h6 class="mb-0">Séances 5-8 : Microservices</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="mb-0 small">
                                        <li>Services spécialisés</li>
                                        <li>Technologies polyvalentes</li>
                                        <li>Scalabilité ciblée</li>
                                        <li>Déploiement indépendant</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Cette progression permet aux étudiants de comprendre les enjeux de chaque approche architecturale.
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Technologies utilisées -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-tools me-2"></i>Technologies</h5>
                </div>
                <div class="card-body">
                    @foreach($technologies as $tech)
                        <span class="badge bg-primary me-2 mb-2">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Équipe de développement -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-users me-2"></i>Équipe</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-graduate fa-3x text-primary"></i>
                        </div>
                        <h6>{{ $developer }}</h6>
                        <p class="text-muted small">
                            Développement dans le cadre de la formation Laravel BTS SIO SLAM
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistiques du projet -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-chart-bar me-2"></i>Statistiques</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="h4 text-primary">8</div>
                            <small class="text-muted">Séances</small>
                        </div>
                        <div class="col-4">
                            <div class="h4 text-success">24h</div>
                            <small class="text-muted">Formation</small>
                        </div>
                        <div class="col-4">
                            <div class="h4 text-info">5</div>
                            <small class="text-muted">Livres démo</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progression des séances -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-road me-2"></i>Progression</h5>
                </div>
                <div class="card-body">
                    <div class="progress-steps">
                        <div class="d-flex align-items-center mb-2">
                            <div class="badge bg-success me-2">1</div>
                            <span class="small">Fondations + Docker</span>
                            <i class="fas fa-check-circle text-success ms-auto"></i>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="badge bg-secondary me-2">2</div>
                            <span class="small text-muted">Base de Données + CI/CD</span>
                            <i class="fas fa-lock text-muted ms-auto"></i>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="badge bg-secondary me-2">3</div>
                            <span class="small text-muted">CRUD + Gamification</span>
                            <i class="fas fa-lock text-muted ms-auto"></i>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">... et 5 séances de plus !</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact et support -->
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-question-circle me-2"></i>Support</h5>
                </div>
                <div class="card-body">
                    <p class="small">Besoin d'aide ou questions sur la formation ?</p>
                    <div class="d-grid gap-2">
                        <a href="../../issues" class="btn btn-outline-primary btn-sm" target="_blank">
                            <i class="fab fa-github me-2"></i>GitHub Issues
                        </a>
                        <a href="../../discussions" class="btn btn-outline-info btn-sm" target="_blank">
                            <i class="fas fa-comments me-2"></i>Discussions
                        </a>
                        <a href="mailto:formation@bts-sio.fr" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-envelope me-2"></i>Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des cartes
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });

        console.log('ℹ️ Page À propos chargée', {
            version: '{{ $version }}',
            technologies: @json($technologies),
            developer: '{{ $developer }}'
        });
    });
</script>
@endpush

@endsection
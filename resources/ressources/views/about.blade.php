@extends('layouts.app', [
    'title' => 'À propos',
    'breadcrumbs' => [
        ['label' => 'À propos', 'url' => null]
    ]
])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h1><i class="fas fa-info-circle"></i> À propos de BiblioTech</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3><i class="fas fa-graduation-cap"></i> Formation BTS SIO SLAM</h3>
                            <p>
                                BiblioTech est un projet pédagogique développé dans le cadre de la formation 
                                <strong>BTS SIO option SLAM</strong> (Solutions Logicielles et Applications Métiers).
                            </p>
                            <ul>
                                <li>Architecture MVC avec Laravel</li>
                                <li>Base de données relationnelle</li>
                                <li>Interface responsive</li>
                                <li>Containerisation Docker</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3><i class="fas fa-cogs"></i> Technologies Utilisées</h3>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-danger">Laravel {{ app()->version() }}</span>
                                <span class="badge bg-primary">PHP {{ phpversion() }}</span>
                                <span class="badge bg-info">Bootstrap 5</span>
                                <span class="badge bg-secondary">PostgreSQL</span>
                                <span class="badge bg-success">Docker</span>
                                <span class="badge bg-warning">GitHub Codespace</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <h3><i class="fas fa-road"></i> Progression des Séances</h3>
                            <div class="timeline">
                                <div class="alert alert-success">
                                    <strong>✅ Séance 1 :</strong> Fondations + Docker<br>
                                    <small>MVC, Routes, Blade Templates, Containerisation</small>
                                </div>
                                <div class="alert alert-secondary">
                                    <strong>🔒 Séance 2 :</strong> Base de Données + CI/CD<br>
                                    <small>Eloquent ORM, Migrations, GitHub Actions</small>
                                </div>
                                <div class="alert alert-secondary">
                                    <strong>🔒 Séance 3 :</strong> CRUD + Gamification<br>
                                    <small>Formulaires, Validation, Système de points</small>
                                </div>
                                <div class="alert alert-secondary">
                                    <strong>🔒 Séances 4-8 :</strong> Fonctionnalités Avancées<br>
                                    <small>Auth, WebSockets, IA, API, Production</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h3><i class="fas fa-target"></i> Objectifs Pédagogiques</h3>
                            <ul>
                                <li>Maîtriser le pattern MVC</li>
                                <li>Développer avec Laravel</li>
                                <li>Comprendre les architectures web modernes</li>
                                <li>Utiliser les outils DevOps</li>
                                <li>Préparer aux certifications professionnelles</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3><i class="fas fa-chart-line"></i> Compétences Acquises</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%">
                                    MVC Pattern - 100%
                                </div>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%">
                                    Laravel Basics - 100%
                                </div>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%">
                                    Docker - 100%
                                </div>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-secondary" style="width: 0%">
                                    Base de données - 0%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">
                        <i class="fas fa-code"></i>
                        Développé avec ❤️ pour l'apprentissage Laravel
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
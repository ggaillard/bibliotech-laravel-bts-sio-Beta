@extends('layouts.app')

@section('title', "Bonjour $name !")

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Accueil</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Démonstration</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Carte principale -->
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-hand-wave me-2"></i>
                        Démonstration : Paramètres de Route
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Message de salutation -->
                    <div class="text-center py-4">
                        <div class="display-1 mb-3">👋</div>
                        <h1 class="display-4 text-primary">Bonjour {{ $name }} !</h1>
                        <p class="lead">
                            Cette page démontre l'utilisation des <strong>paramètres optionnels</strong> dans les routes Laravel.
                        </p>
                    </div>

                    <!-- Explication technique -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5><i class="fas fa-code me-2"></i>Comment ça fonctionne ?</h5>
                            
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6>Route définie dans <code>routes/web.php</code> :</h6>
                                    <pre class="bg-dark text-light p-3 rounded"><code>Route::get('/hello/{name?}', function($name = 'Monde') {
    return view('demo.hello', compact('name'));
})->name('demo.hello');</code></pre>
                                    
                                    <h6 class="mt-3">Paramètre optionnel :</h6>
                                    <ul class="mb-0">
                                        <li><code>{name?}</code> = paramètre optionnel (le <code>?</code> le rend optionnel)</li>
                                        <li><code>$name = 'Monde'</code> = valeur par défaut si aucun paramètre</li>
                                        <li><code>compact('name')</code> = passer la variable à la vue</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exemples d'URLs -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5><i class="fas fa-link me-2"></i>Exemples d'utilisation :</h5>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>URL</th>
                                            <th>Paramètre</th>
                                            <th>Résultat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>/hello</code></td>
                                            <td><em>aucun</em></td>
                                            <td>Bonjour Monde !</td>
                                            <td>
                                                <a href="{{ route('demo.hello') }}" class="btn btn-sm btn-outline-primary">
                                                    Tester
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>/hello/Laravel</code></td>
                                            <td>Laravel</td>
                                            <td>Bonjour Laravel !</td>
                                            <td>
                                                <a href="{{ route('demo.hello', 'Laravel') }}" class="btn btn-sm btn-outline-success">
                                                    Tester
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>/hello/Docker</code></td>
                                            <td>Docker</td>
                                            <td>Bonjour Docker !</td>
                                            <td>
                                                <a href="{{ route('demo.hello', 'Docker') }}" class="btn btn-sm btn-outline-info">
                                                    Tester
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>/hello/BTS-SIO</code></td>
                                            <td>BTS-SIO</td>
                                            <td>Bonjour BTS-SIO !</td>
                                            <td>
                                                <a href="{{ route('demo.hello', 'BTS-SIO') }}" class="btn btn-sm btn-outline-warning">
                                                    Tester
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Exercice interactif -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5><i class="fas fa-play me-2"></i>Exercice Interactif :</h5>
                            
                            <div class="card border-warning">
                                <div class="card-body">
                                    <p class="card-text">
                                        Testez différentes valeurs en modifiant l'URL dans votre navigateur :
                                    </p>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">{{ url('/hello/') }}</span>
                                        <input type="text" class="form-control" id="customName" placeholder="Votre nom ici">
                                        <button class="btn btn-warning" onclick="testCustomName()">
                                            <i class="fas fa-arrow-right me-2"></i>Tester
                                        </button>
                                    </div>
                                    
                                    <small class="text-muted mt-2 d-block">
                                        <i class="fas fa-lightbulb me-1"></i>
                                        Essayez : votre prénom, un nom de technologie, ou même des espaces !
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Concepts Laravel expliqués -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5><i class="fas fa-graduation-cap me-2"></i>Concepts Laravel démontrés :</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-success h-100">
                                        <div class="card-header bg-success text-white">
                                            <h6 class="mb-0">✅ Routes avec paramètres</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul class="mb-0">
                                                <li>Paramètres obligatoires : <code>{id}</code></li>
                                                <li>Paramètres optionnels : <code>{name?}</code></li>
                                                <li>Valeurs par défaut</li>
                                                <li>Contraintes sur paramètres</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-info h-100">
                                        <div class="card-header bg-info text-white">
                                            <h6 class="mb-0">✅ Passage de données aux vues</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul class="mb-0">
                                                <li>Fonction <code>compact()</code></li>
                                                <li>Tableau associatif</li>
                                                <li>Variables dans Blade</li>
                                                <li>Affichage sécurisé</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <a href="{{ route('home') }}" class="btn btn-primary me-2">
                                <i class="fas fa-home me-2"></i>Retour à l'accueil
                            </a>
                            <a href="{{ route('books.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-books me-2"></i>Voir le catalogue
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card informative pour les séances futures -->
            <div class="card mt-4 border-warning">
                <div class="card-header bg-warning text-dark">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Pour aller plus loin...
                    </h6>
                </div>
                <div class="card-body">
                    <p class="mb-2">Dans les séances suivantes, vous apprendrez :</p>
                    <ul class="mb-0">
                        <li><strong>Séance 2 :</strong> Contraintes sur paramètres, validation des données</li>
                        <li><strong>Séance 3 :</strong> Formulaires et méthodes HTTP (POST, PUT, DELETE)</li>
                        <li><strong>Séance 4 :</strong> Middleware et protection des routes</li>
                        <li><strong>Séance 8 :</strong> API REST avec paramètres complexes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function testCustomName() {
        const input = document.getElementById('customName');
        const name = input.value.trim() || 'Anonyme';
        
        // Encoder l'URL pour gérer les caractères spéciaux
        const encodedName = encodeURIComponent(name);
        const url = `{{ url('/hello/') }}/${encodedName}`;
        
        window.location.href = url;
    }

    // Permettre la validation avec Entrée
    document.getElementById('customName').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            testCustomName();
        }
    });

    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 200);
        });

        console.log('👋 Page de démonstration chargée', {
            parameter: '{{ $name }}',
            route: '{{ Route::currentRouteName() }}',
            url: window.location.href
        });
    });
</script>
@endpush

@endsection
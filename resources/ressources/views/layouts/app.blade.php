<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ isset($title) ? $title . ' - ' : '' }}BiblioTech</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    @vite(['resources/css/app.css'])
</head>
<body class="bg-light">
    
    {{-- Navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <i class="fas fa-book-open me-2"></i>
                <strong>BiblioTech</strong>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                            <i class="fas fa-books"></i> Catalogue
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-info-circle"></i> À propos
                        </a>
                    </li>
                </ul>
                
                {{-- Barre de recherche --}}
                <form class="d-flex" action="{{ route('books.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="q" 
                           placeholder="Rechercher un livre..." value="{{ request('q') }}">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Fil d'Ariane --}}
    @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
    <nav aria-label="breadcrumb" class="bg-white shadow-sm">
        <div class="container">
            <ol class="breadcrumb py-3 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                @foreach($breadcrumbs as $breadcrumb)
                    @if($loop->last)
                        <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
    </nav>
    @endif

    {{-- Contenu principal --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-light mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-book-open"></i> BiblioTech</h5>
                    <p class="mb-0">Système de gestion de bibliothèque moderne avec Laravel.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        Formation BTS SIO SLAM - Séance {{ isset($seance) ? $seance : '1' }}<br>
                        <small>Laravel {{ app()->version() }} • PHP {{ phpversion() }}</small>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js'])
    
    @stack('scripts')
</body>
</html>
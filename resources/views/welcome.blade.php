@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="card">
        <h1>🎯 {{ $message }}</h1>
        <p style="font-size: 1.2rem; color: #666; margin: 20px 0;">
            Formation Laravel progressive - <strong>Séance 1 : Fondations</strong>
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 30px 0;">
            <div class="card" style="text-align: center; background: #e8f4f8;">
                <h3>📚 {{ $stats['total_books'] }}</h3>
                <p>Livres disponibles</p>
            </div>
            <div class="card" style="text-align: center; background: #f0f8e8;">
                <h3>👥 {{ $stats['total_users'] }}</h3>
                <p>Utilisateurs inscrits</p>
            </div>
            <div class="card" style="text-align: center; background: #f8f0e8;">
                <h3>🚀 {{ $stats['app_version'] }}</h3>
                <p>Version application</p>
            </div>
            <div class="card" style="text-align: center; background: #f8e8f0;">
                <h3>⚡ {{ $stats['laravel_version'] }}</h3>
                <p>Laravel version</p>
            </div>
        </div>
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('books.index') }}" class="btn">
                📖 Découvrir le catalogue
            </a>
        </div>
    </div>
    <div class="card">
        <h2>🎯 Objectifs Séance 1</h2>
        <p>À la fin de cette séance, vous maîtriserez :</p>
        <ul style="margin: 15px 0; padding-left: 30px;">
            <li><strong>Architecture MVC</strong> : Comprendre Model-View-Controller</li>
            <li><strong>Routes Laravel</strong> : Définir et utiliser les routes</li>
            <li><strong>Contrôleurs</strong> : Organiser la logique applicative</li>
            <li><strong>Blade Templates</strong> : Créer des vues dynamiques</li>
        </ul>
        <div style="background: #e8f6ff; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3>💡 Concepts Clés :</h3>
            <p><strong>MVC</strong> = Séparer les responsabilités pour un code plus maintenable</p>
            <p><strong>Routes</strong> = Associer URLs et actions</p>
            <p><strong>Blade</strong> = Templates avec héritage et composants</p>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Catalogue des Livres')

@section('content')
    <h1>📚 Catalogue des Livres</h1>
    <p style="color: #666; margin-bottom: 30px;">
        {{ $total }} livre{{ $total > 1 ? 's' : '' }} dans notre collection
    </p>
    <div style="display: grid; gap: 20px;">
        @foreach($books as $book)
            <div class="book-card card">
                <div class="book-title">{{ $book['title'] }}</div>
                <div class="book-author">par {{ $book['author'] }}</div>
                <div class="book-meta">
                    📅 {{ $book['year'] }} • 📄 {{ $book['pages'] }} pages
                </div>
                <p style="margin: 15px 0; color: #555;">
                    {{ $book['description'] }}
                </p>
                <div style="margin-top: 15px;">
                    <a href="{{ route('books.show', $book['id']) }}" class="btn">
                        👁️ Voir détails
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div style="text-align: center; margin: 40px 0;">
        <a href="{{ route('home') }}" class="btn btn-outline">
            ← Retour à l'accueil
        </a>
    </div>
    <div class="card" style="background: #fff3cd; border-left: 4px solid #ffc107;">
        <h3>📖 Séance 1 : Données Statiques</h3>
        <p>
            Pour cette première séance, les livres sont définis directement dans le contrôleur.
            À partir de la <strong>Séance 2</strong>, nous utiliserons une vraie base de données avec Eloquent !
        </p>
    </div>
@endsection
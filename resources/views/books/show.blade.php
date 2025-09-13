@extends('layouts.app')

@section('title', $book['title'])

@section('content')
    <div class="card">
        <h1>📖 {{ $book['title'] }}</h1>
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; margin: 30px 0;">
            <div>
                <h3>📋 Informations</h3>
                <table style="width: 100%; margin: 20px 0;">
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px 0; font-weight: bold;">Auteur :</td>
                        <td style="padding: 10px 0;">{{ $book['author'] }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px 0; font-weight: bold;">Année :</td>
                        <td style="padding: 10px 0;">{{ $book['year'] }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px 0; font-weight: bold;">Pages :</td>
                        <td style="padding: 10px 0;">{{ $book['pages'] }} pages</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px 0; font-weight: bold;">ISBN :</td>
                        <td style="padding: 10px 0; font-family: monospace;">{{ $book['isbn'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; font-weight: bold;">ID :</td>
                        <td style="padding: 10px 0; color: #666;">#{{ $book['id'] }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>📝 Description</h3>
                <p style="margin: 20px 0; line-height: 1.8; color: #555;">
                    {{ $book['description'] }}
                </p>
                <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
                    <h4 style="color: #667eea;">💡 Concept Blade : Variables</h4>
                    <p>Ces données proviennent du contrôleur via <code>$book['title']</code></p>
                    <p>En Blade, on affiche avec <code>{{ "{{ \$book['title'] }}" }}</code></p>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('books.index') }}" class="btn">
                ← Retour au catalogue
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline">
                🏠 Accueil
            </a>
        </div>
    </div>
    <div class="card" style="background: #d1ecf1; border-left: 4px solid #17a2b8;">
        <h3>🎯 Séance 1 : Route avec Paramètre</h3>
        <p>
            Cette page utilise la route <code>/livre/{id}</code> avec le paramètre <strong>{{ $book['id'] }}</strong>.
        </p>
        <p>
            Le contrôleur récupère ce paramètre pour afficher le bon livre.
            URL actuelle : <code>{{ request()->url() }}</code>
        </p>
    </div>
@endsection
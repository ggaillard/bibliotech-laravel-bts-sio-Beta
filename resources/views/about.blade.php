@extends('layouts.app')

@section('title', 'À propos')

@section('content')
    <div class="card">
        <h1>ℹ️ À propos de BiblioTech</h1>
        <p style="font-size: 1.1rem; margin: 20px 0; color: #555;">
            BiblioTech est une application de démonstration créée pour la formation Laravel BTS SIO SLAM.
        </p>
        <h2>🎯 Objectif Pédagogique</h2>
        <p>
            Cette application évolue progressivement sur 8 séances pour enseigner tous les aspects 
            du développement moderne avec Laravel.
        </p>
        <h3>📅 Progression des Séances</h3>
        <div style="display: grid; gap: 15px; margin: 20px 0;">
            <div class="card" style="background: #d4edda; border-left: 4px solid #28a745;">
                <strong>Séance 1 : 🏗️ Fondations</strong> - MVC + Blade + Routes (EN COURS)
            </div>
            <div class="card" style="background: #f8f9fa; border-left: 4px solid #6c757d;">
                <strong>Séance 2 : 🗄️ Base de Données</strong> - Eloquent + Migrations + CI/CD
            </div>
            <div class="card" style="background: #f8f9fa; border-left: 4px solid #6c757d;">
                <strong>Séance 3 : ✏️ CRUD + Gamification</strong> - Formulaires + Points/Badges
            </div>
            <div class="card" style="background: #f8f9fa; border-left: 4px solid #6c757d;">
                <strong>Séance 4 : 🔐 Auth + WebSockets</strong> - Sécurité + Temps Réel
            </div>
        </div>
    </div>
@endsection
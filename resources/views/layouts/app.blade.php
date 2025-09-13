<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BiblioTech') - Séance 1</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; background: #f8f9fa; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav { display: flex; justify-content: space-between; align-items: center; }
        .nav h1 { font-size: 1.8rem; }
        .nav-links { display: flex; gap: 20px; }
        .nav-links a { color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; transition: background 0.3s; }
        .nav-links a:hover { background: rgba(255,255,255,0.2); }
        .main { padding: 40px 0; min-height: 60vh; }
        .card { background: white; padding: 20px; margin: 20px 0; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .book-card { border-left: 4px solid #667eea; transition: transform 0.2s; }
        .book-card:hover { transform: translateY(-2px); }
        .book-title { font-size: 1.3rem; color: #2c3e50; margin-bottom: 10px; }
        .book-author { color: #666; font-style: italic; margin-bottom: 10px; }
        .book-meta { font-size: 0.9rem; color: #888; margin-bottom: 15px; }
        .btn { display: inline-block; padding: 10px 20px; background: #667eea; color: white; text-decoration: none; border-radius: 4px; transition: background 0.3s; }
        .btn:hover { background: #5a6fd8; }
        .btn-outline { background: transparent; border: 2px solid #667eea; color: #667eea; }
        .btn-outline:hover { background: #667eea; color: white; }
        .footer { background: #2c3e50; color: white; text-align: center; padding: 20px 0; margin-top: 40px; }
        @media (max-width: 768px) { .nav { flex-direction: column; gap: 10px; } .nav-links { flex-wrap: wrap; } .container { padding: 0 15px; } }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <h1>📚 BiblioTech</h1>
                <div class="nav-links">
                    <a href="{{ route('home') }}">🏠 Accueil</a>
                    <a href="{{ route('books.index') }}">📖 Livres</a>
                    <a href="{{ route('about') }}">ℹ️ À propos</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 BiblioTech - Formation Laravel BTS SIO SLAM</p>
            <p><strong>Séance 1 :</strong> Fondations MVC + Blade + Routes</p>
        </div>
    </footer>
</body>
</html>
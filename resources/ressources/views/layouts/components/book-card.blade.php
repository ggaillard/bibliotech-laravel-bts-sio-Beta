{{-- Composant carte livre réutilisable --}}
@props(['book', 'showDetails' => false])

<div class="card h-100 shadow-sm">
    <img src="{{ $book['cover'] ?? '/images/books/default.jpg' }}" 
         class="card-img-top" alt="{{ $book['title'] }}" 
         style="height: 200px; object-fit: cover;">
    
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $book['title'] }}</h5>
        <p class="card-text text-muted">
            <i class="fas fa-user"></i> {{ $book['author'] }}
        </p>
        
        @if(isset($book['category']))
        <span class="badge bg-secondary mb-2">{{ $book['category'] }}</span>
        @endif
        
        @if($showDetails && isset($book['description']))
        <p class="card-text">{{ Str::limit($book['description'], 100) }}</p>
        @endif
        
        <div class="mt-auto">
            @if(isset($book['available']))
                @if($book['available'])
                    <span class="badge bg-success mb-2">
                        <i class="fas fa-check"></i> Disponible
                    </span>
                @else
                    <span class="badge bg-warning mb-2">
                        <i class="fas fa-clock"></i> Emprunté
                    </span>
                @endif
            @endif
            
            <div class="d-grid">
                <a href="{{ route('books.show', $book['id']) }}" class="btn btn-outline-primary">
                    <i class="fas fa-eye"></i> Voir détails
                </a>
            </div>
        </div>
    </div>
</div>
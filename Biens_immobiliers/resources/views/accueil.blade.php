<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel 10 Custom Login and Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
    .carousel-item img {
      max-height: 600px; /* Hauteur maximale des images dans le carousel */
      width: auto; /* Ajustement automatique de la largeur */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
            </ul>
            @guest
            <form action="{{ route('deconnexion') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Connexion</button>
            </form>
        @endguest
            @auth
                <form action="{{ route('deconnexion') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Déconnexion</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @auth
        <div class="row mb-4">
            <div class="col">
                <a href="/ajouter" class="btn btn-primary">Ajouter des biens</a>
            </div>
        </div>
    @endauth

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($biens as $index => $bien)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" @if($index === 0) class="active" @endif aria-current="true" aria-label="Slide {{ $index }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
          @foreach($biens as $index => $bien)
              <div class="carousel-item @if($index === 0) active @endif">
                  <img src="{{ $bien->image }}" class="d-block w-100 img-fluid" alt="{{ $bien->nom }}">
                  <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $bien->nom }}</h5>
                      <p>{{ $bien->description }}</p>
                  </div>
              </div>
          @endforeach
      </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>

    <hr>

    <div class="row">
        @foreach($biens as $bien)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bien->nom }}</h5>
                        <p class="card-text">{{ $bien->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $bien->date_de_creation }}</small></p>
                        <p class="card-text"><strong>Statut:</strong> {{ $bien->statut ? 'occupé' : 'non occupé' }}</p>
                        @auth
                            <a href="/modifier-bien/{{ $bien->id }}" class="btn btn-info">Modifier</a>
                            <a href="/supprimer-bien/{{ $bien->id }}" class="btn btn-danger">Supprimer</a>
                        @endauth
                        <a href="{{ route('bien.details', $bien->id) }}" class="btn btn-primary">Voir les détails</a>
                      </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@guest
    <div class="container mt-4">
        <h1 class="text-center">Bienvenue, visiteur!</h1>
        <p class="text-center">Connectez-vous pour ajouter, modifier ou supprimer des biens.</p>
    </div>
@endguest

</body>
</html>

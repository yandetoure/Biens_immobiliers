<!-- resources/views/bien/details.blade.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détails du bien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="card">
      <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->image }}">
      <div class="card-body">
        <h5 class="card-title">{{ $bien->nom }}</h5>
        <p class="card-text">{{ $bien->description }}</p>
        @foreach ($categories as $categorie)
        <p class="card-text"><small class="text-muted">{{ $categorie->libelle }}</small></p>
        @endforeach
        <p class="card-text"><small class="text-muted">{{ $bien->created_at }}</small></p>
        <p class="card-text"><strong>Statut:</strong> {{ $bien->statut ? 'occupe' : 'pas_occupe' }}</p>
      </div>
    </div>

    <hr>

    <div class="comments-section">
        <h4>Commentaires</h4>
        @foreach($bien->commentaires as $commentaire)
          <div class="card mb-2">
            <div class="card-body">
              <p class="card-text">{{ $commentaire->contenu }}</p>
              <p class="card-text">{{ $commentaire->auteur }}</p>
              <p class="card-text"><small class="text-muted">Posté le {{ $commentaire->created_at }}</small></p>
              <a href="{{ route('commentaires.mettre_a_jour', $commentaire->id) }}" class="btn btn-info btn-sm">Modifier</a>
              <form action="{{ route('commentaires.supprimer', $commentaire->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      

    <hr>

    <div class="add-comment-section">
      <h4>Ajouter un commentaire</h4>
      <form action="{{ route('commentaires.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bien_id" value="{{ $bien->id }}">
        <div class="mb-3">
            <label for="nom_auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="nom_auteur" name="nom_auteur" required>
            <br>
            <label for="contenu" class="form-label">Commentaire</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
        </div>.
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

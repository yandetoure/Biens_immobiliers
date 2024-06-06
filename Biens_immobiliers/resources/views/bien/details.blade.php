<!-- resources/views/bien/details.blade.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détails du bien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .bien-details {
      margin-top: 20px;
    }
    .card-img-left {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px;
    }
    .comments-section {
      margin-top: 40px;
    }
    .comments-section h4 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .card-comment {
      margin-bottom: 20px;
      border-left: 4px solid #007bff;
      padding-left: 15px;
    }
    .add-comment-section {
      margin-top: 40px;
    }
    .add-comment-section h4 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .comment-actions {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <div class="row bien-details">
      <div class="col-md-6">
        <img src="{{ $bien->image }}" class="card-img-left img-fluid" alt="{{ $bien->nom }}">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title display-4">{{ $bien->nom }}</h5>
          <p class="card-text lead">{{ $bien->description }}</p>
          <p class="card-text"><span class="badge bg-secondary">{{ $bien->categorie->libelle }}</span></p>
          <p class="card-text"><small class="text-muted">{{ $bien->created_at->format('d M Y, H:i') }}</small></p>
          <p class="card-text"><strong>Statut:</strong> <span class="badge {{ $bien->statut ? 'bg-success' : 'bg-warning' }}">{{ $bien->statut ? 'occupé' : 'non occupé' }}</span></p>
        </div>
      </div>
    </div>

    <div class="comments-section">
      <h4>Commentaires</h4>
      @foreach($bien->commentaires as $commentaire)
        <div class="card card-comment">
          <div class="card-body">
            <p class="card-text">{{ $commentaire->contenu }}</p>
            <p class="card-text"><strong>{{ $commentaire->auteur }}</strong></p>
            <p class="card-text"><small class="text-muted">Posté le {{ $commentaire->created_at->format('d M Y, H:i') }}</small></p>
            <div class="comment-actions">
              <a href="{{ route('commentaires.mettre_a_jour', $commentaire->id) }}" class="btn btn-link btn-sm">Modifier</a>
              <form action="{{ route('commentaires.supprimer', $commentaire->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="add-comment-section">
      <h4>Ajouter un commentaire</h4>
      <form action="{{ route('commentaires.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bien_id" value="{{ $bien->id }}">
        <div class="mb-3">
          <label for="auteur" class="form-label">Auteur</label>
          <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <div class="mb-3">
          <label for="created_at" class="form-label">Date et Heure de Création</label>
          <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
        </div>
        <div class="mb-3">
          <label for="contenu" class="form-label">Commentaire</label>
          <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

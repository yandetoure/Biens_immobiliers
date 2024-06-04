<!DOCTYPE html>
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
            <p class="card-text"><small class="text-muted">{{ $bien->categorie->libelle }}</small></p>
            <p class="card-text"><small class="text-muted">{{ $bien->created_at }}</small></p
            <p class="card-text"><strong>Statut:</strong> {{ $bien->statut ? 'occupe' : 'pas_occupe' }}</p>
          </div>
        </div>
</body>
</html>
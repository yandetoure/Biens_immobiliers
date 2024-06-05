<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un bien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .form-container {
      max-width: 600px;
      margin: auto;
      margin-top: 50px;
    }
    .form-container h1 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="form-container">
        <h1>Ajouter un bien</h1>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('bien.ajouterBien') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
          </div>
          <div class="mb-3">
            <label for="statut" class="form-label">Le bien est-il occupé ?</label>
            <select class="form-select" id="statut" name="statut">
              <option value="occupe">Oui</option>
              <option value="pas_occupe">Non</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-select" id="categorie_id" name="categorie_id" required>
              @foreach($categories as $categorie)
              <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select class="form-select" id="user_id" name="user_id" required>
              @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter un bien</button>
          </div>
        </form>
        <div class="mt-3 text-center">
          <a href="/bien" class="btn btn-danger">Retour</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

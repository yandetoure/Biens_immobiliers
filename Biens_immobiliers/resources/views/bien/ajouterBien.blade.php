<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD IN LARAVEL 11</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row align-items-start">
      <div class="col">
        <h1>AJOUTER UN bien</h1>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <ul>
          @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>

        <form action="ajouterBien/Traitement" method="POST" class="form-group"> 
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="Nom" name="nom">
          </div>
          <div class="form-group">
            <label for="Description" class="form-label">Description</label>
            <input type="text" class="form-control" id="Description" name="description">
          </div>
       <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" class="form-control" id="image" name="image"  required>
  </div>
  <div class="form-group">
    <label for="adresse" class="form-label">adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse">
  </div>  
  <br>
  <label for="statut">Le bien est-il occupé ?</label>
  <div class="form-check">
      <input class="form-check-input" type="radio" name="statut" id="occupe" value="occupe">
      <label class="form-check-label" for="occupe">Oui</label>
  </div>
  <div class="form-check">
      <input class="form-check-input" type="radio" name="statut" id="pas_occupe" value="pas_occupe">
      <label class="form-check-label" for="pas_occupe">Non</label>
  </div>
          <br><br>
          <div class="form-group">
            <label for="categorie_id">Categorie</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Ajouter un bien</button>
          <br><br>
          <a href="/bien" class="btn btn-danger">Retour</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

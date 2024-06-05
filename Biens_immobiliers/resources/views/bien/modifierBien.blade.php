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
            <h1>MODIFIER UN BIEN</h1>

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

            <form action="/modifierBien/Traitement" method="POST" class="form-group" enctype="multipart/form-data"> 
                @csrf

                <input type="text" name="id" style="display: none;"  value="{{ $bien->id }}">
                <div class="form-group">
                  <label for="Nom" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="Nom" name="nom" value="{{ $bien->nom }}">
                </div>
                <div class="form-group">
                    <label for="Description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="Description" name="description" value="{{ $bien->description }}">
                </div>
                <div class="form-group">
            <label for="categorie_id">Categorie</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Veuillez mettre l'URL de l'image</label>
                    <input class="form-control" type="text" id="image" name="image" value="{{ $bien->image }}">
                </div>
                <label for="statut">Le bien est-il occupé ?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statut" id="oui" value="1" {{ $bien->statut ? 'checked' : '' }}>
                    <label class="form-check-label" for="oui">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statut" id="non" value="0" {{ !$bien->statut ? 'checked' : '' }}>
                    <label class="form-check-label" for="non">
                        Non
                    </label>
                </div>
                          
                <br><br>
                <button type="submit" class="btn btn-primary">modifier un bien</button>
                <br><br>
                <a href="/article" class="btn btn-danger">Retour</a>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </div>
    </div>
</div>
</body>
</html>

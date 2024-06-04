<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
        }
        .container {
            max-width: 600px;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Inscription</h2>
      <div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="label-form">Nom complet</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Saisissez votre nom" >
            </div>
            <div class="mb-3">
                <label for="email" class="label-form">Nom email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="exemple@gmail.com" >
            </div>
            <div class="mb-3">
                <label for="password" class="label-form">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="***********" >
            </div>
            <div class="mb-3">
        <div class="d-grid">
            <button class="btn btn-primary">Inscription</button>
        </div>
      </div>
        </form>
      </div>
 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

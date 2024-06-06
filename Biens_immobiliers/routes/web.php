<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AccueilController;
use App\Models\Categorie;
use App\Http\Controllers\BienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentaireController;


Route::get('/', function () {
    return view('welcome');
});


// Routes protégées par le middleware 'auth'
Route::get('/bien/{id}', [BienController::class, 'afficher_details'])->name('bien.details');
Route::middleware('auth')->group(function () {
    Route::get('/bien', [BienController::class, 'ListeBien'])->name('Bien.index');
    Route::get('/ajouter', [BienController::class, 'ajouterBien']);
    Route::post('/ajouterBien/Traitement', [BienController::class, 'ajouterBienTraitement'])->name('bien.ajouterBien');
    Route::get('/modifier-bien/{id}', [BienController::class, 'modifierBien'])->name('Bien.modifierBien');
    Route::post('/modifierBien/Traitement', [BienController::class, 'modifierBienTraitement']);
    Route::get('/supprimer-bien/{id}', [BienController::class, 'supprimerBien'])->name('bien.supprimer');
    
});
    // Routes pour les commentaires
    Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::get('/commentaires/{id}/modifier', [CommentaireController::class, 'modifier'])->name('commentaires.mettre_a_jour');
    Route::put('/commentaires/{id}', [CommentaireController::class, 'modifierTraitement'])->name('commentaires.modifier');
    Route::delete('/commentaires/{id}', [CommentaireController::class, 'supprimer'])->name('commentaires.supprimer');

// Route group for categories
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('index');
    Route::get('/create', [CategorieController::class, 'create'])->name('create');
    Route::post('/', [CategorieController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [CategorieController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [CategorieController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [CategorieController::class, 'destroy'])->name('destroy');
});






Route::get('/connexion', [AuthController::class, 'connexion'])->name('connexion');
Route::group(['middleware' => 'guest'],function(){
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::post('/connexion', [AuthController::class, 'connexionPost'])->name('connexion.post');
});

Route::get('/index', [AccueilController::class, 'index'])->name('index');
    Route::delete('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');

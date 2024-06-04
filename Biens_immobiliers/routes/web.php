<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentaireController;
use App\Models\Categorie;
use App\Http\Controllers\BienController;
use App\Http\Controllers\AccueilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bien', [BienController::class, 'ListeBien'])->name('Bien.index');
Route::get('/bien/{id}', [BienController::class, 'afficher_details'])->name('bien.details');
Route::get('/ajouter', [BienController::class, 'ajouterBien']);
Route::post('/ajouterBien/Traitement', [BienController::class, 'ajouterBienTraitement'])->name('Bien.ajouterBien');
Route::get('/modifier-bien/{id}', [BienController::class, 'modifierBien'])->name('Bien.modifierBien');
Route::post('/modifierBien/Traitement', [BienController::class, 'modifierBienTraitement'])->name('Bien.modifierBien');
Route::get('/supprimer-bien/{id}', [BienController::class, 'supprimerBien'])->name('bien.supprimer');


// Route pour créer un nouveau commentaire
Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');

// Route pour afficher le formulaire de modification d'un commentaire
Route::get('/commentaires/{id}/modifier', [CommentaireController::class, 'modifier'])->name('commentaires.mettre_a_jour');

// Route pour mettre à jour un commentaire
Route::put('/commentaires/{id}', [CommentaireController::class, 'modifierTraitement'])->name('commentaires.modifier');

// Route pour supprimer un commentaire
Route::delete('/commentaires/{id}', [CommentaireController::class, 'supprimer'])->name('commentaires.supprimer');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');


// Route group for categories
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('index');
    Route::get('/create', [CategorieController::class, 'create'])->name('create');
    Route::post('/', [CategorieController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [CategorieController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [CategorieController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [CategorieController::class, 'destroy'])->name('destroy');
});


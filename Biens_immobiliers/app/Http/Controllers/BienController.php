<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function ajouterBien() {
        $categories = Categorie::all(); // Récupère toutes les catégories de la base de données
        $users = User::all(); // Récupère toutes les catégories de la base de données
        return view('bien.ajouterBien',compact('categories','users'));
    }

    public function ajouterBienTraitement(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string', 
            'adresse' => 'required|string',
            'statut' => 'required|in:occupe,pas_occupe',
            'image' => 'required',
            'user_id' => 'required|exists:users,id',
            'categorie_id' => 'required|exists:categories,id',

        ]);
    
                // Initialisation de la variable pour le chemin de l'image
                $image = null;
                // Vérifier si un fichier image est uploadé
                if ($request->hasFile('image')) {
                    // Stocker l'image dans le répertoire 'public/blog'
                    $chemin_image = $request->file('image')->store('public/blog');
        
                    // Vérifier si le chemin de l'image est bien généré
                    if (!$chemin_image) {
                        return redirect()->back()->with('error', "Erreur lors du téléchargement de l'image.");
                    }
        
                    // Récupérer le nom du fichier de limage
                    $image = basename($chemin_image);
                }
        
    
        Bien::create($validatedData);
    
        return redirect()->route('Bien.ajouterBien')->with('status', "Le bien a été ajouté avec succès");

    }

    public function ListeBien(){
        $biens = Bien::all();
        return view('bien.listeBiens', compact('biens'));
    }

    public function afficher_details($id){
        $bien = Bien::findOrFail($id);
        return view('bien.details', compact('bien'));
    }

    // App\Http\Controllers\BienController.php



    
    public function modifierBien($id)
    {
        $bien = Bien::findOrFail($id);
        return view('Bien.modifierBien', compact('bien'));
    }

    public function modifierBienTraitement(Request $request) {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'statut' => 'required',
            'image' => 'required',
        ]);
        $bien = Bien::find($request->id);
        $bien ->nom = $request->nom;
        $bien ->description = $request->description;
        $bien ->image = $request->image;
        $bien ->statut = $request->statut;
        $bien ->update();
        return redirect('/bien')->with('status',"Le bien a bien été modifié avec succès");

    }

    public function supprimerBien($id)
    {
        $bien = bien::findOrFail($id);
        $bien->delete();

        return redirect()->route('bien.index')->with('status', "Le bien a bien été supprimé avec succès");
    }
    
}

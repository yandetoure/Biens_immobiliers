<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'auteur' => 'required|string|max:255',
            'bien_id' => 'required|exists:biens,id',
        ]);

        Commentaire::create($validatedData);

        return redirect()->route('bien.details', ['id' => $request->bien_id])
            ->with('status', 'Commentaire ajouté avec succès');
    }

    public function modifier($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaire.modifier', compact('commentaire'));
    }

    public function modifierTraitement(Request $request, $id)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'auteur' => 'required|string|max:255', // Assurez-vous que ce champ correspond à votre formulaire
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($validatedData);

        return redirect()->route('bien.details', ['id' => $commentaire->bien_id])
            ->with('status', 'Commentaire mis à jour avec succès');
    }

    public function supprimer($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $bienId = $commentaire->bien_id;
        $commentaire->delete();

        return redirect()->route('bien.details', ['id' => $bienId])
            ->with('status', 'Commentaire supprimé avec succès');
    }
}

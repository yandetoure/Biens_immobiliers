<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('/Categories.index', compact('categories'));
    }

    public function create()
    {
        return view('/Categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Categorie::create($request->all());
        return redirect()->route('categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function show(Categorie $categorie)
    {
        return view('/Categories.show', compact('categorie'));
    }

    public function edit(Categorie $categorie)
    {
        return view('/Categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $categorie->update($request->all());
        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}

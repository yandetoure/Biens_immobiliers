<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index (){
        $biens = Bien::all();
        return view('accueil', compact('biens'));
    }
  
    
}

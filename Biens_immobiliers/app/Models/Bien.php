<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'nom',
        'description',
        'prix',
        'image',
        'statut',
        'adresse',
        'user_id',
        'categorie_id',
        ];

      // Enum valeurs pour la colonne 'statut' 
    const STATUT_OCCUPE = 'occupe';
    const STATUT_PAS_OCCUPE = 'pas_occupe';

        public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function Commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

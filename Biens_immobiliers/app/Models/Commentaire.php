<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['bien_id', 'contenu', 'auteur'];


    public function Bien()
    {
        return $this->belongsTo(Bien::class);
    }
}

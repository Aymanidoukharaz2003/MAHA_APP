<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Projet;

class Produit extends Model
{
    protected $fillable = ['name', 'quantite', 'marque', 'modele', 'projet_id', 'user_name','terminer'];
    use HasFactory;
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
    public function echantillon()
    {
        return $this->hasMany(Echantillon::class);
    }
}

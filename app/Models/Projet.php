<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{ 
    protected $fillable = ['name', 'date', 'statu'];
    
    use HasFactory;
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class);
    }

    public function consulteurs()
    {
        return $this->belongsToMany(Consulteur::class);
    }
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
    public function personnel()
    {
        return $this->belongsToMany(Personnel::class, 'personnel_projet');
    }
}

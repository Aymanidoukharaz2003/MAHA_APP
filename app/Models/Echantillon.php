<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Echantillon extends Model
{
    protected $fillable = ['nserie', 'user_name', 'produit_id','description'];
    use HasFactory;
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

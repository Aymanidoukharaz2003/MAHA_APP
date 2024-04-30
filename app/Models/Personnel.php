<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'adresse', 'telephone', 'cin'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'personnel_projet', 'personnel_id', 'projet_id');
    }
    public function projet(){
        return $this->belongsToMany(Projet::class);
    }
    
}

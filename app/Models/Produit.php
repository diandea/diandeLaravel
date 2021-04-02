<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'designation',
        'description',
        'prix',
        'like',
        'pays_source',
        'poids',
        'image_produit',
    ];

    public function commande()
    {
        return $this->hasMany(Commande::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

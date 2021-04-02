<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    public function produit(){
        return $this->belongsTo(Produit::class, 'id_produit', 'id');  
    }
}

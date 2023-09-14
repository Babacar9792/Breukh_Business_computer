<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function numeroCommande()
    {
        return [];
    }


    public function succursaleProduits(): BelongsToMany
    {
        return $this->belongsToMany(SuccursaleProduit::class, 'produits_commandes')->withPivot("prix_vendu", "quantite", "reduction", "id");
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }
}

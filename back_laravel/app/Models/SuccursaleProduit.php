<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SuccursaleProduit extends Model
{
    use HasFactory;
    protected $fillable = [
        'succursale_id',
        'produit_id',
        'prix',
        'stock'

    ];
    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class, 'produits_commandes');
    }
}

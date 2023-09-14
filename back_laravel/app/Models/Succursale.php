<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Succursale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'reduction'
    ];

    public function produits() : BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'succursale_produits')->withPivot('prix', 'stock');
    }
}

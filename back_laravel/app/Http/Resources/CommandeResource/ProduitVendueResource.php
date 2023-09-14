<?php

namespace App\Http\Resources\CommandeResource;

use App\Http\Resources\SuccursaleProduit\ProduitResource;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitVendueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'succursale_produit_id' => $this->id,
            'produit' => new ProduitResource(Produit::find($this->produit_id)),
            'stock' => $this->stock,
            'prix' => $this->prix,
            'produits_commande_id' => $this->pivot['id'],
            'prix_vendu' => $this->pivot['prix_vendu'],
            'quantite_vendu' => $this->pivot['quantite'],
            'renduction_vente_produit' => $this->pivot['reduction']
        ];
    }
}

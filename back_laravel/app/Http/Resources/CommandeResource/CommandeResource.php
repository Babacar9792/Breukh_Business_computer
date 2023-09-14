<?php

namespace App\Http\Resources\CommandeResource;

use App\Http\Resources\UtilisateurResource\UtilisateurResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
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
            'id' => $this->id,
            'numero' => $this->numero_commande,
            'date_commande' => $this->date_commande,
            'reduction' => $this->reduction,
            'utilisateur' => new UtilisateurResource($this->utilisateur),
            "produit_vendu" => ProduitVendueResource::collection($this->succursaleProduits)  
        ];
    }
}

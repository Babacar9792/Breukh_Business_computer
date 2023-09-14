<?php

namespace App\Http\Resources\ResourseSuccursaleProduit;

use App\Http\Resources\Succursale\SuccursaleResource;
use App\Http\Resources\SuccursaleProduit\ProduitResource;
use App\Models\Produit;
use App\Models\Succursale;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleProduitResource extends JsonResource
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
            "succursale" => new SuccursaleResource(Succursale::find($this->succursale_id)),
            'produit' => new ProduitResource(Produit::find($this->produit_id)),
            "prix" => $this->prix,
            'stock' => $this->stock
        ];
    }
}

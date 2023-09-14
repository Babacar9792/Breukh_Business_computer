<?php

namespace App\Http\Resources\Succursale;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleResource extends JsonResource
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
            "id" => $this->id,
            "nom" => $this->nom,
            "telephone" => $this->telephone,
            "adresse" => $this->adresse,
            "reduction" => $this->reduction,
            "produits" => $this->produits
        ];
    }
}

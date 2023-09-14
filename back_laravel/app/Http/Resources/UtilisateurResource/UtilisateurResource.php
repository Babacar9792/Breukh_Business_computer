<?php

namespace App\Http\Resources\UtilisateurResource;

use App\Http\Resources\Succursale\SuccursaleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilisateurResource extends JsonResource
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
            "succursale" => new SuccursaleResource($this->succursale)
        ];
    }
}

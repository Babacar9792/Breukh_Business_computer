<?php

namespace App\Http\Resources;

use App\Http\Resources\Succursale\SuccursaleResource;
use App\Models\Succursale;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleAmiResource extends JsonResource
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
            "succursale" =>  new SuccursaleResource(Succursale::find($this->succursale_id)),
            "ami" => new SuccursaleResource(Succursale::find($this->ami_id))
        ];
    }
}

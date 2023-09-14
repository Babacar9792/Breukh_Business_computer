<?php

namespace App\Http\Resources\Succursale;

use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SuccursaleCollection extends ResourceCollection
{
    use ResponseTrait;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->responseData('',$this->collection, true, '');
    }

    public function paginationInformation($request,$paginated, $default){
            return ['links'=> $default["meta"]["links"]];
    }

}

<?php

namespace App\Http\Requests\ProduitRequest;

use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AddProduitRequest extends FormRequest
{

    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'succursale_id' => 'required|numeric|exists:succursales,id',
            'libelle' => 'required|min:3',
            'prix' => 'required|numeric|min:1',
            'stock' => 'sometimes|numeric|min:0'
        ];
    }
    public function messages(): array
    {
        return [
            "succursale_id.required" => "veuiller choisir la succursale qui enregistre le produit",
            "succursale_id.numeric" => "La valeur de l'id doit etre un entier",
            "succursale_id.exists" => "La succursale que vous avez choisi n'existe pas",
            "libelle.required" => "Le libelle est obligatoire",
            "libelle.min" => "Le libelle doit comporter au moins trois caractères",
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($this->responseData('', [], false, $validator->errors()), JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

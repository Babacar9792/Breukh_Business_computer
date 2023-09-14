<?php

namespace App\Http\Requests\ProduitRequest;

use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateProduitRequest extends FormRequest
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
            "libelle" => "sometimes|required|min:3",
            "description" => "sometimes"
        ];

    }

    public function messages() : array{
        return [
            "libelle.required" => "Le champ du libelle ne doit pas etre vide",
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

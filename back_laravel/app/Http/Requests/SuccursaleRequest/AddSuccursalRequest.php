<?php

namespace App\Http\Requests\SuccursaleRequest;

use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AddSuccursalRequest extends FormRequest
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
            'nom' => 'required|string|unique:succursales,nom',
            'reduction' => 'sometimes|min:0|max:100',
            'telephone' => 'sometimes|required|unique:succursales,telephone',
            'adresse' => 'sometimes|required'
            

            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($this->responseData('', [], false, $validator->errors()), JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function messages() : array{
        return [
            'nom.required' => 'Le nom de la succursale est obligatoire',
            'nom.string' => 'Le nom de la succursale ne doit contenir que des lettres et de chiffres',
            'nom.unique' => 'Cette succursale existe déjà',
            'reduction.number' =>' La reduction doit etre un entier',
            'reduction.min' => 'La reduction doit etre supérieur ou égale à 0',
            'reduction.max' => 'La reduction doit etre inférieur ou égale à 100',
            'telephone.unique' => 'Le telephone que vous avez saisi existe déjà',
            'telephone.required' => 'le telephone ne doit pas etre vide'
        ];
    }

  
}

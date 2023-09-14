<?php

namespace App\Http\Requests\SuccursaleRequest;

use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateSuccursalRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException(
        //     response()->json([
        //         'message' => '',
        //         'errors' => $validator->errors(),
        //         'data' => [],
        //         'status' => false
        //     ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        // );
        throw new HttpResponseException(
            response()->json($this->responseData('', [], false, $validator->errors()), JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nom" => 'sometimes|required|string',
            "telephone" => "sometimes|required",
            "adresse" => "sometimes|required",
            "reduction" => "sometimes|numeric|min:0|max:100"
            //
        ];
    }

    public function messages(){
        return [
            'nom.required' => 'le champ nom ne doit pa etre vide',
            'nom.string' => 'le nom ne doit comporter que des lettres et des chiffres',
            "nom.unique" => 'le nom que vous avez choisi existe déjà',
            'telephone.required' => 'le champ du telephone ne doit pa etre vide',
            'telephone.unique' => 'Le telephone existe déjà',
            'adresse.required' => 'le champ ne doit pas etre vide',
            'reduction.numeric' => 'la reduction neodit comporter que des chiffres',
            'reduction.max' => 'la valeur de la reduction doit etre inféreur ou égal à 100',
            'reduction.min' => 'la valeur de la reduction doit etre supérieur ou égal à 0',
            
        ];
    }
}

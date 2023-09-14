<?php

namespace App\Http\Requests\SuccursaleAmi;

use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AddSuccursaleAmiRequest extends FormRequest
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
            'ami_id' => 'required|numeric|exists:succursales,id'
            //
        ];
    }

    public function messages() : array{
        return [
            'succursale_id.required' => "Veuiler choisir une succursale pour lui octroyer un ami",
            'succursale_id.numeric' => 'La valeur doit etre un id numeric',
            'succursale_id.exists' => 'La valeur que vous avez choisie n\'existe pas',
            'ami_id.required' => "Veuiler choisir une succursale pour lui octroyer un ami",
            'ami_id.numeric' => 'La valeur doit etre un id numeric',
            'ami_id.exists' => 'La valeur que vous avez choisie n\'existe pas'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($this->responseData('', [], false, $validator->errors()), JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

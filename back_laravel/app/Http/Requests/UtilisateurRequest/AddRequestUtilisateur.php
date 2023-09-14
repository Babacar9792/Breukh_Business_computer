<?php

namespace App\Http\Requests\UtilisateurRequest;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestUtilisateur extends FormRequest
{
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
            //
            'nom' => 'required|string',
            'email' => 'required|email|unique:utilisateurs,email',
            'telephone' => 'required|unique:utilisateurs,telephone',
            'password' => 'required|min:3',
            'succursale_id' => 'required|numeric|exists:succursales,id'

        ];
    }

    public function messages() : array{
        return [
            "nom.required" => "Le champ nom ne doit pas etre vide",
            "nom.string" => "Le nom ne doit contenir que des lettres et des chiffres",
            "email.required" => "Le champ de l'email ne doit pas etre vide",
            "email.email" => "format email incorrect",
            "email.unique" => 'l\'email que vous avez choisie existe déjà',
            "telephone.require" => "Le telephone est obligatoire",
            "telephone.unique" => "Le telephone que vous avez chopisie existe déjà",
            "password.required" => 'Le mot de passe est obligatoire et doit comporter au moins trois carcteres',
            "password.min" => "Le mot de passe doit comportere au moins trois caracteres",
            'succursale_id.required' => 'Vous devez rattaché l\'utilisateur à une succursale',
            'succrsale_id.exists' => "Succursale inexistante"
        ];
    }
}

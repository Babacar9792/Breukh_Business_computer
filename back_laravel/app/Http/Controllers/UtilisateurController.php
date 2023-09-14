<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest\AddRequestUtilisateur;
use App\Http\Resources\UtilisateurResource\UtilisateurResource;
use App\Models\Utilisateur;
use App\Trait\ResponseTrait;
// use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilisateurController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRequestUtilisateur $request)
    {
        $utilisateur = DB::transaction(function () use ($request) {
            return Utilisateur::create($request->all());
        });
        return $this->responseData('', [$utilisateur], true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        //
        return $this->responseData("", [new UtilisateurResource($utilisateur)], true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $supp =  Utilisateur::where('id', $request->id)->delete();
        if ($supp) {
            return $this->responseData("donnée supprimée", [], true);
        }
        return $this->responseData("une erreur s'est produit lors de la suppression", [], false);
    }
}

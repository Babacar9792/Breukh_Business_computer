<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandeResource\CommandeResource;
use App\Models\Commande;
use App\Models\ProduitsCommande;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
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
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $commande = Commande::create([
                "utilisateur_id" => $request->utilisateur_id,
                "reduction" => $request->reduction ?? 0,
                "numero_commande" => time(),
            ]);

            $commande->succursaleProduits()->attach($request->produitCommande);
        });
        // return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $this->responseData('',new  CommandeResource(Commande::find($request->commande)), true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}

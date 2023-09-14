<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest\AddProduitRequest;
use App\Http\Resources\ResourseSuccursaleProduit\SuccursaleProduitResource;
use App\Models\Produit;
use App\Models\SuccursaleProduit;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class ProduitController extends Controller
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
    public function store(AddProduitRequest $request)
    {
        $produit = Produit::where('libelle', ucfirst(strtolower($request->libelle)))->first();
        if ($produit) {
            try {
                $sucPro = SuccursaleProduit::create([
                    'produit_id' => $produit->id,
                    'succursale_id' => $request->succursale_id,
                    'prix' => $request->prix,
                    "stock" => $request->stock ?? 0
                ]);
                return $this->responseData('insertion reussie', [$sucPro], true);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), [], false);
            }
        }
        DB::beginTransaction();
        try {
            $prod = Produit::create([
                'libelle' => ucfirst(strtolower($request->libelle)),
                'description' => $request->description,
                'code' => 'code' + ucfirst(strtolower($request->libelle)),
            ]);
            $sucPro = SuccursaleProduit::create([
                'produit_id' => $prod->id,
                'succursale_id' => $request->succursale_id,
                'prix' => $request->prix,
                "stock" => $request->stock ?? 0
            ]);
            DB::commit();
            return $this->responseData('insertion reussie', [new SuccursaleProduitResource($sucPro)], true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseData($th->getMessage(), []);
        }
    }

    /**
     * Display the specified resource.
     * permet de lister les produit d'une succursale dont l'id a été passée en parametre;
     */
    public function show(Request $request)
    {
        return json_encode($this->responseData("", SuccursaleProduitResource::collection(SuccursaleProduit::where("succursale_id", $request->produit)->get()), true));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Il prend en parametre l'id de la table SuccursaleProduit pour supprimer la ligne correspondante.
     */
    public function destroy(Request $request)
    {
        try {
            SuccursaleProduit::where('id', $request->id)->delete();
            return $this->responseData("Donnée supprimée", [], true);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), [], false);
        }
    }

    public function getProduitByCode(HttpFoundationRequest $request)
    {
        return SuccursaleProduit::where("produit_id", Produit::where('code', $request['code'])->first()->id)->get();
    }
    public function getProduitByLibelle(HttpFoundationRequest $request)
    {
        return $this->responseData(
            '',
            SuccursaleProduitResource::collection(SuccursaleProduit::whereIn("produit_id", [...Produit::where('libelle', 'like', '%' . ucfirst(strtolower($request['libelle'])) . '%')->pluck('id')])->get()),
            true
        );
    }


    /* 
    geProdBCode
    ajout marque
    */
}

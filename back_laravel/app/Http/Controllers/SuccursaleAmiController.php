<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuccursaleAmi\AddSuccursaleAmiRequest;
use App\Http\Resources\SuccursaleAmiResource;
use App\Models\SuccursaleAmis;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class SuccursaleAmiController extends Controller
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
    public function store(AddSuccursaleAmiRequest $request)
    {
        try {
            $ami = SuccursaleAmis::create($request->all());
            return $this->responseData('insertion réussie', [new SuccursaleAmiResource($ami)], true, '');
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), [], false);
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HttpFoundationRequest $succursaleAmis)
    {
        return $this->responseData(
            '',
            SuccursaleAmiResource::collection(
                SuccursaleAmis::where("succursale_id", $succursaleAmis['succursaleAmi'])
                    ->get()
            ),
            true,
            ''
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuccursaleAmis $succursaleAmis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Il prends en parametre dans l'url l'id de la ligne qui se trouve dans la succursale ami
     */
    public function destroy(SuccursaleAmis $succursaleAmis)
    {
        try {
            SuccursaleAmis::where('id', $succursaleAmis->id)->delete();
            return $this->responseData('Vous vous ễtes desabonné de la succursale', [], true);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage());
        }
    }

    public function getProduitsBySuccursale($id){
        return $id;

    }


     
}

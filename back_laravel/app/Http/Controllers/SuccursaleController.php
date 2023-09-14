<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuccursaleRequest\AddSuccursalRequest;
use App\Http\Requests\SuccursaleRequest\UpdateSuccursalRequest;
use App\Http\Resources\Succursale\SuccursaleCollection;
use App\Http\Resources\Succursale\SuccursaleResource;
use App\Models\Succursale;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;

class SuccursaleController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = Succursale::paginate(2);

        // return $this->responseData('', SuccursaleResource::collection(Succursale::all()), true, '');
        return new SuccursaleCollection($paginate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSuccursalRequest $request)
    {
        try {
            $succursale = Succursale::create($request->all());
            return [
                'data' => SuccursaleResource::collection([$succursale]),
                'message' => 'insertion réussie',
                'status' => true
            ];
        } catch (\Throwable $th) {
            return [
                "message" => 'erreur : ' . $th->getMessage(),
                'data' => [],
                'status' => false
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        return [
            "message" => '',
            "status" => true,
            "data" => SuccursaleResource::collection(Succursale::where("nom", 'like', '%' . $request->succursale . '%')->get())
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuccursalRequest $request)
    {
        try {
            Succursale::where('id', $request['succursale'])->update($request->all());
            return [
                'message' => "Données modifiées",
                "status" => true,
                "data" => SuccursaleResource::collection(Succursale::where('id', $request['succursale'])->get())
            ];
        } catch (\Throwable $th) {
            return [
                "message" => $th->getMessage(),
                "data" => [],
                "status" => false
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succursale $succursale)
    {
        try {
            Succursale::where('id', $succursale->id)->delete();
            return [
                "message" => 'Succursale supprimée',
                "data" => [],
                "status" => true
            ];
        } catch (\Throwable $th) {
            return [
                "message" => $th->getMessage(),
                "data" => [],
                "status" => false
            ];
        }
    }
}

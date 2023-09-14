<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SuccursaleAmiController;
use App\Http\Controllers\SuccursaleController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Succursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group(['prefix' => 'auth'], function () {
//     Route::get('/login',"AuthController@login");
//     Route::post('/login',"AuthController@authenticate");
//     Route::get('/logout',"AuthController@logout");
// });

Route::apiResource('/succursale', SuccursaleController::class);
Route::prefix('/succursale')->group(function () {
    Route::get('succursale/{id}/produit', [SuccursaleController::class, 'getProduitsBySuccursale']);
});
Route::apiResource('/succursaleAmi', SuccursaleAmiController::class);
Route::apiResource("/produit", ProduitController::class);
Route::get('/produitByCode/{code}', [ProduitController::class, 'getProduitByCode']);
Route::get('/produitByLibelle/{libelle}', [ProduitController::class, 'getProduitByLibelle']);


Route::prefix("/utilisateur")->group(function () {
    Route::post("", [UtilisateurController::class, "store"]);
    Route::get('/{utilisateur}', [UtilisateurController::class, 'show']);
});


Route::prefix('/commande')->group(function (){
    Route::post("", [CommandeController::class, "store"]);
    Route::get("/{commande}", [CommandeController::class, 'show']);
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

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

Route::get("/autos",[AutoController::class,"Listar"]);
Route::get("/autos/{d}",[AutoController::class,"ListarUno"]);
Route::post("/autos",[AutoController::class,"Insertar"]);
Route::put("/autos/{d}",[AutoController::class,"Modificar"]);
Route::delete("/autos/{d}",[AutoController::class,"Eliminar"]);

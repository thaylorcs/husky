<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('entregas', [EntregaController::class, 'index']);
Route::get('entrega/{id}', [EntregaController::class, 'show']);
Route::post('entrega', [EntregaController::class, 'store']);
Route::put('entrega/{id}', [EntregaController::class, 'update']);
Route::delete('entrega/{id}', [EntregaController::class, 'destroy']);

<?php

use App\Http\Api\Controllers\SaunaController;
use App\Http\Api\Controllers\SaunaSlotDateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saunas', [SaunaController::class, 'index'])->name('api.saunas');
Route::get('/saunas/{sauna:slug}', [SaunaController::class, 'show'])->name('api.sauna');
Route::get('/saunas/{sauna:slug}/slots/{date}', [SaunaSlotDateController::class, 'index'])->name('api.sauna.slots');

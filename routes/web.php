<?php

use App\Http\Controllers\FighterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeightclassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);


Route::get('/weightclass', [WeightclassController::class, 'index']);
// Afficher le formulaire
Route::get('/weightclass/creer', [WeightclassController::class, 'create']);
// Traiter le formulaire
Route::post('/weightclass/creer', [WeightclassController::class, 'store']);

// CRUD fighters
Route::get('/fighters', [FighterController::class, 'index']);
Route::get('/figthers/create', [FighterController::class, 'create']);
Route::post('/fighters/create', [FighterController::class, 'store']);
Route::get('/fighters/{id}', [FighterController::class, 'show']);
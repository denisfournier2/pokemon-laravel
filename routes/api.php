<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PokemonController;

Route::get('/pokemon', [PokemonController::class, 'index']);
// Route::get('/pokemon/{name}', [PokemonController::class, 'show']);
Route::post('/pokemon', [PokemonController::class, 'store']);
Route::delete('/pokemon/{pokemon}', [PokemonController::class, 'destroy']);

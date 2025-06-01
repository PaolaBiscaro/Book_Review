<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AutorController::class)->group(function () {
    Route::get('/autores', 'get');
    Route::get('/autores/{id}', 'details');
    Route::post('/autores', 'store');
    Route::patch('/autores/{id}', 'update');
    Route::delete('/autores/{id}', 'delete');

});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos', 'get');
    Route::get('/generos/{id}', 'details');
    Route::post('/generos', 'store');
    Route::patch('/generos/{id}', 'update');
    Route::delete('/generos/{id}', 'delete');

});

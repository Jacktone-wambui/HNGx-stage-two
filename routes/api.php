<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('people/{id}', [PersonController::class, 'getPerson']);
Route::post('people', [PersonController::class, 'createPerson']);
Route::put('people/{id}', [PersonController::class, 'updatePerson']);
Route::delete('people/{id}', [PersonController::class, 'deletePerson']);

<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ChartJSController::class, 'index']);

Route::resource("types", TypeController::class);
Route::resource("candidats", CandidatController::class);
Route::resource("referentiels", ReferentielController::class);
Route::resource("formations", FormationController::class);

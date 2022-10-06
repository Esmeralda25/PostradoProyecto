<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
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
Route::get('/periodos/{periodo}/periodoEstudianteGet', [PeriodoController::class, 'periodoEstudianteGet'])->name('periodos.periodoEstudianteGet');
Route::get('/periodos/{periodo?}/periodoEstudianteAsignar', [PeriodoController::class, 'periodoEstudianteAsignar'])->name('periodos.periodoEstudianteAsignar');
Route::patch('/periodos/{periodo?}/periodoEstudianteAsignarPatch', [PeriodoController::class, 'periodoEstudianteAsignarPatch'])->name('periodos.periodoEstudianteAsignarPatch');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

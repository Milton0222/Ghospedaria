<?php

use App\Http\Controllers\hospedeController;
use App\Http\Controllers\quartosController;
use App\Http\Controllers\reservasController;
use App\Http\Controllers\utilizadorController;
use App\Models\hospedes;
use App\Models\quartos;
use App\Models\requisicoes;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hospede/show',[hospedeController::class,'index'])->name('hospede.index');
Route::get('/Quartos/show',[quartosController::class ,'index'])->name('quarto.index');
Route::get('/Reservas/show',[reservasController::class ,'index'])->name('reserva.index');
Route::get('/User/show',[utilizadorController::class,'index'])->name('user.index');

Route::post('/quarto/salvar',[quartosController::class, 'store'])->name('quarto.store');
Route::get('/quarto/actualizar/{id}',[quartosController::class, 'update'])->name('quarto.update');
Route::get('/Quarto/Apagar/{id}',[quartosController::class, 'destroy'])->name('quarto.delete');

Route::post('/hospede/salvar',[hospedeController::class, 'store'])->name('hospede.store');
Route::get('/hospede/Actualiza/{id}',[hospedeController::class, 'update'])->name('hospede.update');
Route::get('/hospede/apagar/{id}',[hospedeController::class, 'destroy'])->name('hospede.destroy');

Route::post('/user/salvar',[utilizadorController::class ,'store'])->name('user.store');
Route::get('/user/apagar/{id}',[utilizadorController::class,'destroy'])->name('user.destroy');

Route::get('/Requisitar/ver',[reservasController::class, 'show'])->name('requisitar.show')->middleware('auth');
Route::post('/requisitar/salvar',[reservasController::class, 'store'])->name('requisitar.store');
Route::get('/reserva/apagar/{id}',[reservasController::class, 'destroy'])->name('reserva.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
          $quartos=quartos::count();
          $hospedes=hospedes::count();
          $reservas=requisicoes::count();
        return view('dashboard',compact('quartos','hospedes','reservas'));
    })->name('dashboard');
});

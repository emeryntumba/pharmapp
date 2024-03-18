<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;

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

Route::middleware('auth')->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('home', [IndexController::class, 'index'])->name('index');
    Route::get('/vente', [VenteController::class, 'index'])->name('vente');
    Route::get('/stock', [StockController::class, 'index'])->name('stock');

    Route::controller(ProduitController::class)->group(function(){
        Route::group(['prefix' => 'produit'], function(){
            Route::get('', [ProduitController::class, 'index'])->name('produit');
            Route::get('{id}','showTransactions')->name('produit.show');
            Route::get('edit/{id}',  'edit')->name('produit.edit');
            Route::put('update/{id}', 'update')->name('produit.update');
        });
    });
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ParametreController;
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

    Route::get('vente', [VenteController::class, 'index'])->name('vente');

    Route::get('factures', [FactureController::class, 'index'])->name('facture');

    Route::get('stock', [StockController::class, 'index'])->name('stock');

    Route::get('produit/create', [ProduitController::class, 'create'])->name('produit.create');
    Route::get('produit/edit/{id}',  [ProduitController::class, 'edit'])->name('produit.edit');
    Route::controller(ProduitController::class)->group(function(){
        Route::group(['prefix' => 'produit'], function(){
            Route::get('', [ProduitController::class, 'index'])->name('produit');
            Route::get('{id}','showTransactions')->name('produit.show');
            Route::put('update/{id}', 'update')->name('produit.update');
            Route::post('enregistrement/post', 'store')->name('produit.store');
        });
    });



    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('finance', [FinanceController::class, 'index'])->name('finance');
    Route::get('finance/portefeuille', [FinanceController::class, 'showPortefeuille'])->name('finance.portefeuille');

   Route::middleware('role:administrateur')->group(function(){
        Route::get('parametres', [ParametreController::class, 'index'])->name('parametre');
        Route::put('parametres/update', [ParametreController::class, 'update'])->name('parametre.update');
   });

    Route::get('chart/sell-evolution', [IndexController::class, 'recenteVente']);
    Route::get('chart/mostselled', [IndexController::class, 'mostselled']);
    Route::get('chart/moyenne-annee', [IndexController::class, 'getAllVenteAnnee']);
    Route::get('chart/moyenne-mois', [IndexController::class, 'totalVenteMois']);
});


Route::get('/etablissement/register', [EtablissementController::class, 'create'])->name('etablissement.create');
Route::post('/etablissement/register/post', [EtablissementController::class, 'store'])->name('etablissement.store');

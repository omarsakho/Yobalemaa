<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\PermisController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TarificationController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\HomeController;

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

// Route accessible par tous
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


// Routes accessibles uniquement aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('chauffeurs', ChauffeurController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('contrats', ContratController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('permis', PermisController::class);
    Route::resource('tarifications', TarificationController::class);
    Route::resource('vehicules', VehiculeController::class);

    Route::put('/locations/{location}/validate', [LocationController::class, 'validateLocation'])->name('locations.validate');
    Route::get('/locations/{location}/confirm-validation', [LocationController::class, 'confirmValidation'])->name('locations.confirm-validation');
    Route::get('/tarifications/{tarification}/print', [TarificationController::class, 'printInvoicePDF'])->name('tarifications.printInvoicePDF');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Ajoutez les routes auxquelles les utilisateurs peuvent accéder ici
    Route::get('/vehicules/{vehicule}', [VehiculeController::class, 'show'])->name('vehicules.show');
    Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
});

Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

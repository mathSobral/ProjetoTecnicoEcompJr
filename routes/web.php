<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FederationController;
use App\Http\Controllers\JuniorCompanyController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home.index');
});

Route::get('home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group( ['middleware' => 'auth:sanctum' ], function()
{
    Route::resource('federations', FederationController::class);
    Route::resource('junior_companies', JuniorCompanyController::class);
});



Route::get('search', [JuniorCompanyController::class, 'search'])->name('search');

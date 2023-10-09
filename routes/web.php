<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
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
Route::prefix('categorie')->name('categorie.')->middleware('auth')->controller(CategorieController::class)->group(function(){
  Route::get('/create','create')->name('create');  
  Route::post('/store','store')->name('store');  
  Route::get('/show','show')->name('show');  
  Route::get('/destory/{id}','destory')->name('destory');  
  Route::get('/edit/{id}','edit')->name('edit');   
  Route::post('/update/{id}','update')->name('update');   
});

Route::prefix('produit')->name('produit.')->controller(ProduitController::class)->group(function(){
  Route::get('/create','create')->name('create');  
  Route::post('/store','store')->name('store');  
  Route::get('/show','show')->name('show');  
  Route::get('/destory/{id}','destory')->name('destory');  
  Route::get('/edit/{id}','edit')->name('edit');   
  Route::post('/update/{id}','update')->name('update');    
});

Route::get('login',[AuthController::class, 'login'])->name('auth.login');
Route::post('login',[AuthController::class, 'doLogin']);
Route::delete('logout',[AuthController::class, 'logout'])->name('auth.logout');
  
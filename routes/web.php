<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
// ************************** page de connexion / inscription ******************************

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


// *********************** ACCUEIL (home.blade.php)/ liste des messages**************************

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

//***********************Toutes les authentification **********//
Auth::routes();



//*********************Utilisateurs******************************* */
Route::resource('/users', \App\Http\Controllers\UserController::class)->except('index', 'create','store');


//*********************Posts******************************* */
Route::resource('/posts', \App\Http\Controllers\PostController::class)->except('index', 'create','show');

//*****************************Comment****************** */
Route::resource('/comments' , \App\Http\Controllers\CommentController::class)->except('index', 'create', 'show');


Route::get('/admin' , [\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
//*********************************Barre de recherche**************** */

Route::get('/search' , [\App\Http\Controllers\PostController::class, 'search'])->name('search');

//********************************Politique et confidentialités ****************/

Route::get('/politique' , [\App\Http\Controllers\HomeController::class, 'politique'])->name('politique');
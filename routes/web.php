<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

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
    return view('index');
})->name("index");

Route::get('signup', function () {
    return view("sign.signup");
})->name("sinscrire");

Route::get('signin', function () {
    return view("sign.signin");
})->name("seconnecter");

Route::get('client', function () {
    return view("clients.main");
})->name("clients");

Route::get('transaction', function () {
    return view("clients.transaction");
})->name("transaction");

Route::get('activite', function () {
    return view("clients.activite");
})->name("activite");

Route::get('addaccount', function () {
    return view("clients.addaccount");
})->name("addaccount");

Route::resource('utilisateurs',UtilisateurController::class);
Route::post('', [UtilisateurController::class,'login'])->name('utilisateurs.login');
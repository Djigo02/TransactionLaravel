<?php

use App\Http\Controllers\CompteController;
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

Route::get('admin', function () {
    return view("admin.main");
})->name("admins");

// Page d'accueil du guichetier
Route::get('guichetier', function () {
    return view("guichetier.main");
})->name("guichetiers");

// depot du guichetier
Route::post('guichetier', [UtilisateurController::class, 'depot'])->name("guichetier.depot");

// Le client veut faire un transaction on lui affiche le formulaire de transaction
Route::get('transaction', function () {
    return view("clients.transaction");
})->name("transaction");

// Le client veut faire un transaction on lui affiche le formulaire de transaction
Route::post('transac', [CompteController::class, 'transaction'])->name("comptes.transaction");

// Le client veut voir ses activités financieres
Route::get('activite', function () {
    return view("clients.activite");
})->name("activite");

Route::get('addaccount', function () {
    return view("clients.addaccount");
})->name("addaccount");

Route::resource('utilisateurs',UtilisateurController::class);
Route::post('', [UtilisateurController::class,'login'])->name('utilisateurs.login');
Route::delete('', [UtilisateurController::class,'logout'])->name('utilisateurs.logout');

Route::resource('comptes',CompteController::class);
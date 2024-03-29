<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\CarteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Models\Compte;
use App\Models\Carte;
use App\Models\Depot;
use Illuminate\Support\Facades\Session;

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
    return view("clients.main", ['historique'=>Depot::all()->where('idutilisateur',Session::get('auth')['id'])]);
})->name("clients");

Route::get('admin', function () {
    $comptes = Compte::all();
    return view('admin.main', ['comptes' => $comptes]);
})->name("admins");

// Page d'accueil du guichetier
Route::get('guichetier', function () {
    return view("guichetier.main");
})->name("guichetiers");

// depot du guichetier
Route::post('guichetier', [UtilisateurController::class, 'depot'])->name("guichetier.depot");

// changer de status de compte blocker ou deblocker
Route::post('status/{compte}', [CompteController::class, 'changestatus'])->name("changestatus");

// Le client veut faire un transaction on lui affiche le formulaire de transaction
Route::get('transaction', function () {
    return view("clients.transaction");
})->name("transaction");

// Le client veut faire un transaction on lui affiche le formulaire de transaction
Route::post('transac', [CompteController::class, 'transaction'])->name("comptes.transaction");

// Le client veut voir ses cartes virtuelles
Route::get('carte-virtuelle', function () {
    return view("clients.activite", ['cartes' => Carte::all()->where('idU',Session::get('auth')['id'])]);
})->name("activite");

Route::get('addaccount', function () {
    return view("clients.addaccount");
})->name("addaccount");

Route::resource('utilisateurs',UtilisateurController::class);
Route::post('', [UtilisateurController::class,'login'])->name('utilisateurs.login');
Route::delete('', [UtilisateurController::class,'logout'])->name('utilisateurs.logout');

Route::resource('comptes',CompteController::class);

Route::resource('cartes',CarteController::class);


<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Compte;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'dateexp' => 'required',
            'solde' => 'required|min:3',
        ]);

        $carte = new Carte();
        $carte->solde = $request->solde;
        $carte->dateexp = $request->dateexp;
        $carte->numero = mt_rand(10000000000000, 90000000000000);
        $carte->cvv = mt_rand(300, 999);
        $carte->username = Session::has("auth") ? Session::get("auth")['prenom']." ".Session::get("auth")['nom'] :"John Doe";
        $carte->idU = Session::get("auth")['id'];
        $c = Compte::all()->where('idutilisateur',Session::get('auth')['id'])->where('typecompte',1)->first();
        $carte->idC = $c->id;
        $carte->save();

        $nbV = Carte::all()->where('idU',Session::get('auth')['id']);
        Session::put('nbCarte', count($nbV) !=0 ? count($nbV) : 0);

        smilify('success', 'Carte crée avec success !');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Carte $carte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carte $carte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carte $carte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carte $carte)
    {
        //
    }
}

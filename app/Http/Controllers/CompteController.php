<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CompteController extends Controller
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
            "pack"=> "required|min:1|max:3",
            "tcompte"=> "required|min:1|max:3",
        ]);
        $compte = new Compte();
        $compte->rib =  mt_rand(100000, 900000);
        $compte->solde =  0;
        $compte->status =  1;
        $compte->typepack = $request->pack;
        $compte->typecompte = $request->tcompte;
        $compte->idutilisateur = Session::get('auth')['id'];
        $compte->save();
        $hasCourant = Compte::where('idutilisateur', Session::get('auth')['id'])->where('typecompte',1)->first();
        $hasEpargne = Compte::where('idutilisateur', Session::get('auth')['id'])->where('typecompte',2)->first();

        if($hasCourant){
            Session::put('nbCourant', 1);
        }else{
            Session::put('nbCourant', 0);
        }

        if($hasEpargne){
            Session::put('nbEpargne', 1);
        }else{
            Session::put('nbEpargne', 0);
        }
        return redirect()->route('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compte $compte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compte $compte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        //
    }
}

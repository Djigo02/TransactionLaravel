<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Depot;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller
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

        $request->validate([
            'email' => 'required|unique:utilisateurs|email',
            'prenom' => 'required|min:2',
            'nom' => 'required|min:2',
            'telephone' => 'required|min:2',
            'motdepasse' => 'required|min:4',
        ]);

        $user = new Utilisateur();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->telephone = $request->telephone;
        $user->motdepasse = Hash::make($request->motdepasse);
        $user->email = $request->email;
        $user->idProfil = 1;
        $user->save();
        return redirect()->route('seconnecter')->with('success','Inserer avec succée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }

    // Se connecter

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'motdepasse' => 'required',
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if(!$user){
            return back()->with('error','Email et/ou mot de passe incorrect ! ');
        }else{
            $isValid = Hash::check($request->motdepasse, $user->motdepasse);
            if($isValid){
                $hasCourant = Compte::where('idutilisateur', $user->id)->where('typecompte',1)->first();
                $hasEpargne = Compte::where('idutilisateur', $user->id)->where('typecompte',2)->first();

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
                
                Session::put('auth', $user);
                
                switch ($user->idProfil) {
                    case 1:
                        return redirect()->route('clients');
                    case 2:
                        return redirect()->route('admins');
                    case 3:
                        return redirect()->route('guichetiers');
                }

            }else{
                return back()->with('error','Email et/ou mot de passe incorrect ! ');
            }
        }

    }
    
    public function logout(Request $request){
                
        Session::forget('nbCourant');
        Session::forget('nbEpargne');
        Session::forget('auth');
        return redirect()->route('index');

    }
    // Le guichetier fait un depot
    public function depot(Request $request){
        $request->validate(
            [
                'rib'=> 'required',
                'montant'=> 'required',
            ]
        );
        $compte = Compte::where('rib', $request->rib)->first();
        if($compte){
            $depot = new Depot();
            $depot->idutilisateur = Session::get('auth')['id'];
            $depot->rib = $request->rib;
            $depot->solde = $request->montant;
            $depot->save();
            $compte->solde += intval($request->montant);
            $compte->update();
            return redirect()->route('guichetiers')->with('message','Rechargement effectué');
        }
        return redirect()->route('guichetiers')->with('echec','Echec lors du rechargement');
    }
}

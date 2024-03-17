<?php

namespace App\Http\Controllers;

use App\Mail\SignupMail;
use App\Mail\DepotMail;
use App\Models\Compte;
use App\Models\Depot;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Mail;
use PDOException;

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
     * Methode s'inscrire
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

        try{
            $user = new Utilisateur();
            $user->prenom = $request->prenom;
            $user->nom = $request->nom;
            $user->telephone = $request->telephone;
            $user->motdepasse = Hash::make($request->motdepasse);
            $user->email = $request->email;
            $user->idProfil = 1;
            $user->save();
            Mail::to($user->email)->send(new SignupMail($user));
            emotify('success', 'Vous venez de vous inscrire, connectez-vous !');
            return redirect()->route('seconnecter')->with('success','Inscription réussie avec succée');
        }catch(Exception $e){
            connectify('error', 'Probleme de connexion', 'Veuillez reessayer ulterieurement !');
            return redirect()->back()->with('error','Probleme de connexion. Veuillez reessayer ulterieurement !');
        }
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

        try{
            $user = Utilisateur::where('email', $request->email)->first();

        if(!$user){
            notify()->error("Email et/ou mot de passe incorrect ! ");
            return back()->with('error','Email et/ou mot de passe incorrect ! ');
        }else{
            $isValid = Hash::check($request->motdepasse, $user->motdepasse);
            if($isValid){
                $hasCourant = Compte::where('idutilisateur', $user->id)->where('typecompte',1)->first();
                $hasEpargne = Compte::where('idutilisateur', $user->id)->where('typecompte',2)->first();

                if($hasCourant){
                    Session::put('nbCourant', 1);
                    Session::put('CompteCourant', $hasCourant);
                }else{
                    Session::put('nbCourant', 0);
                }

                if($hasEpargne){
                    Session::put('nbEpargne', 1);
                    Session::put('CompteEpargne', $hasEpargne);
                }else{
                    Session::put('nbEpargne', 0);
                }
                
                Session::put('auth', $user);
                
                notify()->success('Connexion réussie', "Bonjour $user->prenom $user->nom");
                switch ($user->idProfil) {
                    case 1:
                        
                        return redirect()->route('clients');
                    case 2:
                        $comptes = Compte::all();
                        return view('admin.main', ['comptes' => $comptes]);
                    case 3:
                        return redirect()->route('guichetiers');
                }

            }else{
                notify()->error("Email et/ou mot de passe incorrect ! ");
                return back()->with('error','Email et/ou mot de passe incorrect ! ');
            }
        }
        }catch(Exception $e){
            connectify('error', 'Probleme de connexion', 'Veuillez reessayer ulterieurement !');
            return redirect()->back()->with('error','Probleme de connexion. Veuillez reessayer ulterieurement !');
        }

    }
    
    public function logout(Request $request){
                
        Session::forget('nbCourant');
        Session::forget('nbEpargne');
        Session::forget('CompteCourant');
        Session::forget('CompteEpargne');
        Session::forget('auth');
        smilify('success', 'A la prochaine, Ba Benene yoon !');
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
            $user = Utilisateur::find($compte->idutilisateur);
            $depot = new Depot();
            $depot->idutilisateur = Session::get('auth')['id'];
            $depot->rib = $request->rib;
            $depot->solde = $request->montant;
            $depot->save();
            $compte->solde += intval($request->montant);
            $compte->update();
            $info = [
                'rib' => $compte->RIB,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'montant' => $depot->solde,
                'solde' => $compte->solde
            ];
            Mail::to($user->email)->send(new DepotMail($info));
            emotify('success', 'Rechargement effectuer');
            return redirect()->route('guichetiers')->with('message','Rechargement effectué');
        }
        notify()->error("Echec lors du rechargement !");
        return redirect()->route('guichetiers')->with('echec','Echec lors du rechargement');
    }

}

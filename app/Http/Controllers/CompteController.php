<?php

namespace App\Http\Controllers;

use App\Mail\AccountMail;
use App\Mail\DepotMail;
use App\Mail\TransactionMail;
use App\Models\Compte;
use App\Models\Pack;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;

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

        $c = $compte->typecompte == 1 ? "Courant" : "Epargne";
        Mail::to(Session::get('auth')['email'])->send(new AccountMail(Session::get('auth'), $c, $compte->rib));

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

    public function transaction(Request $request){
        $request->validate(
            [
                'rib'=> 'required',
                'solde'=> 'required'
            ]
        );

        try{
            $compteSender = Compte::where('idutilisateur', Session::get('auth')['id'])->where('typecompte',1)->first();
            if($compteSender!=null){
                /**
                 * Verifier le solde
                 */
                $tpack = Pack::find($compteSender->typepack);
                if($compteSender->solde>=$request->solde || $request->solde<$tpack->plafond){
                    /**
                     * Si le solde est suffisant verifier si le compte beneficiere existe deja.
                     * Et que le montant est inferieur au plafond 
                     */
                    $compteRecieve = Compte::where('rib', $request->rib)->first();
                    if($compteRecieve && $compteRecieve->status== 1){
                        /**
                        * Si le destinataire existe et que son compte n'est pas blocké
                        */
                        if($compteRecieve->typecompte==1 && $compteRecieve->idutilisateur!=Session::get('auth')['id'] || 
                            ($compteRecieve->typecompte==2 && $compteRecieve->idutilisateur==Session::get('auth')['id'])
                        ){
                            $compteRecieve->solde += $request->solde;
                            $compteSender->solde -= $request->solde;

                            /**
                             * Transaction 
                             */
                            $info = [
                                'a'=> $compteSender->rib,
                                'montant'=> $request->solde,
                                'vers'=> $request->rib,
                                'solde' => $compteSender->solde,
                            ] ;
                            /**
                             * Depot sur le compte du beneficiare
                             */
                            $user = Utilisateur::find($compteRecieve->idutilisateur);
                            $beneficiare = [
                                'rib' => $compteRecieve->RIB,
                                'nom' => $user->nom,
                                'prenom' => $user->prenom,
                                'montant' => $request->solde,
                                'solde' => $compteRecieve->solde
                            ];
                            $compteRecieve->update();
                            $compteSender->update();

                            if(Session::has('CompteCourant') && Session::get('CompteCourant')['rib']==$compteSender->rib){
                                Session::put('CompteCourant',$compteSender);
                            }
                            
                            if(Session::has('CompteEpargne' && Session::get('CompteEpargne')['rib']==$compteRecieve->rib)){
                                Session::put('CompteEpargne',$compteRecieve);
                            }

                            Mail::to(Session::get('auth')['email'])->send(new TransactionMail($info));
                            Mail::to($user->email)->send(new DepotMail($beneficiare));
                            return back()->with('success','Transfert reussie !');
                        }else{
                            /**
                             * Si le compte est celui du connecté (courant) ou un compte epargne d'un autre utilisateur
                             */
                            return back()->with('error','Vous ne pouvez pas effectuer de transfert sur ce compte !');
                        }
                    }else{
                        return back()->with('error','Le compte auquel vous essayer de transferer n\'existe pas ou a été blocké !');
                    }
                }else{
                    return back()->with('error','Solde insufisant ou plafond atteint !');
                }
            }else{
                return back()->with('error','Vous ne possedez pas de compte !');
            }
        }catch(Exception $e){
            return back()->with('error', "Une erreur est survenue, Veuillez reessayer ulterieurement !".$e->getMessage());
        }
    }
}

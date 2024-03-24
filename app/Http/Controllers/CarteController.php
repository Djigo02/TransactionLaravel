<?php

namespace App\Http\Controllers;

use App\Mail\AccountMail;
use App\Mail\CarteMail;
use App\Models\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Compte;
use App\Models\Depot;
use Illuminate\Support\Facades\Mail;

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

        $c = Compte::all()->where('idutilisateur',Session::get('auth')['id'])->where('typecompte',1)->first();

        // $c->solde>= $request->solde
        if($c!=null ){
            // Creation de la carte virtuelle
            if($c->solde>= $request->solde){
                $carte = new Carte();
                $carte->solde = $request->solde;
                $carte->dateexp = $request->dateexp;
                $carte->numero = mt_rand(10000000000000, 90000000000000);
                $carte->cvv = mt_rand(300, 999);
                $carte->username = Session::has("auth") ? Session::get("auth")['prenom']." ".Session::get("auth")['nom'] :"John Doe";
                $carte->idU = Session::get("auth")['id'];  
                $carte->idC = $c->id;
                $carte->save();

                // Debiter le solde du compte courant
                $c->solde-=$carte->solde;
                $c->update();
                // Chaque creation sera considerer comme un depot sera ajouter au recent activite
                $depot = new Depot();
                $depot->rib = 0;
                $depot->solde = $carte->solde;
                $depot->idutilisateur = Session::get('auth')['id'];
                $depot->save();

                // Mettre a jour le compte courant
                Session::put('CompteCourant',$c);

                $nbV = Carte::all()->where('idU',Session::get('auth')['id']);
                Session::put('nbCarte', count($nbV) !=0 ? count($nbV) : 0);

                Mail::to(Session::get('auth')['email'])->send(new CarteMail(Session::get('auth'),$carte->numero, $carte->solde, $carte->cvv, $carte->dateexp));
                smilify('success', 'Carte crée avec success !');
                return back();
            }else{
                smilify('error', 'Votre solde est insuffisant!');
                return back();
            }
        }else{
            smilify('error', 'Desole, vous devez avoir un compte courant !');
            return back();
        }
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

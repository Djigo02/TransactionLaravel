@extends('clients.layout')

@section('contenu_client')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Création d'un compte </h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                      <form action="{{route('comptes.store')}}" method="POST">
                        @csrf
                        <div class="containerForm">
                          <div class="formulaire" id="Form1" action="">
                            <h3>Creer un compte</h3>
                            <h4>Vous êtes sur le point de creer un compte</h4>
                    
                            <div class="btn-box">
                              <button type="button" id="Next1">Commencer</button>
                            </div>
                          </div>
                    
                          <div class="formulaire" id="Form2">
                            <h3>Choisissez votre pack</h3>
                            <select class="form-control" name="pack" required>
                              <option value="">Votre pack</option>
                              <option value="1">Standard</option>
                              <option value="2">Premium</option>
                              <option value="3">Gold</option>
                            </select>
                    
                            <div class="btn-box">
                              <button type="button" id="Back1">Retour</button>
                              <button type="button" id="Next2">Suivant</button>
                            </div>
                          </div>
                    
                          <div class="formulaire" id="Form3" action="">
                            <h3>Selectionner le type de compte</h3>
                            <select class="form-control" name="tcompte">
                              <option value="">Choisissez le type de compte</option>
                              @if (Session::get('nbEpargne')==0)
                                <option value="2">Epargne</option>  
                              @endif
                              @if (Session::get('nbCourant')==0)
                                <option value="1">Courant</option>
                              @endif
                            </select>
                            <div class="btn-box">
                              <button type="button" id="Back2">Retour</button>
                              <button type="submit">Creer</button>
                            </div>
                          </div>
                    
                          <div class="step-row">
                            <div id="progress"></div>
                            <div class="step-col">
                              <small>Commençons</small>
                            </div>
                            <div class="step-col">
                              <small>Bientot fini</small>
                            </div>
                            <div class="step-col">
                              <small>Creation</small>
                            </div>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                </div>

            </div> <!-- /.row -->
            <div class="card-body"></div>
        </div>
    </div><!-- /# column -->
</div>
@endsection
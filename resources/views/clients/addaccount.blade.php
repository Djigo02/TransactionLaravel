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
                      <form action="">
                        
                        <div class="containerForm">
                          <div class="formulaire" id="Form1" action="">
                            <h3>Creer un compte</h3>
                            <input class="form-control" type="text" placeholder="Email" required />
                            <input class="form-control" type="password" placeholder="Mot de passe" required />
                    
                            <div class="btn-box">
                              <button type="button" id="Next1">Next</button>
                            </div>
                          </div>
                    
                          <div class="formulaire" id="Form2" action="">
                            <h3>Choisissez votre pack</h3>
                            <select class="form-control" name="pack">
                              <option value="">Votre pack</option>
                              <option value="">Standard</option>
                              <option value="">Gold</option>
                              <option value="">VIP</option>
                            </select>
                    
                            <div class="btn-box">
                              <button type="button" id="Back1">Back</button>
                              <button type="button" id="Next2">Next</button>
                            </div>
                          </div>
                    
                          <div class="formulaire" id="Form3" action="">
                            <h3>Selectionner le type de compte</h3>
                            <select class="form-control" name="tcompte">
                              <option value="">Choisissez le type de compte</option>
                              <option value="">Epargne</option>
                              <option value="">Courant</option>
                            </select>
                            <div class="btn-box">
                              <button type="button" id="Back2">Back</button>
                              <button type="submit">Soumettre</button>
                            </div>
                          </div>
                    
                          <div class="step-row">
                            <div id="progress"></div>
                            <div class="step-col">
                              <small>Etape 1</small>
                            </div>
                            <div class="step-col">
                              <small>Etape 2</small>
                            </div>
                            <div class="step-col">
                              <small>Etape 3</small>
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
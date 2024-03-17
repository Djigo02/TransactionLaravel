@extends('clients.layout')

@section('contenu_client')
    
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 offset-lg-2 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            @if (Session::has('nbCourant') && Session::get('nbCourant')==1)
                                                <div class="stat-text"><span class="count">{{Session::get('CompteCourant')['solde']}}</span></div>
                                            @endif
                                            @if (Session::has('nbCourant') && Session::get('nbCourant')==0)
                                                <div class="stat-text" style="font-size: 12px">Pas de compte</div>
                                            @endif
                                            <div class="stat-heading">Solde</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-piggy"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            {{-- Verification du compte epargne  --}}
                                            @if (Session::has('nbEpargne') && Session::get('nbEpargne')==1)
                                                <div class="stat-text"><span class="count">{{Session::get('CompteEpargne')['solde']}}</span></div>
                                            @endif
                                            @if (Session::has('nbEpargne') && Session::get('nbEpargne')==0)
                                                <div class="stat-text" style="font-size: 12px">Pas de compte</div>
                                            @endif
                                            <div class="stat-heading" style="font-size: 12px">Solde Epargne</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-credit"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">0</span></div>
                                            <div class="stat-heading" style="font-size: 12px">Cartes Virtuelles</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Bienvenue,  {{Session::get('auth')['prenom']}} {{Session::get('auth')['nom']}} </h4>
                                <p>Votre historique de transaction.</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div class="list-group">
                                        @if (count($historique)>0)
                                            @foreach ($historique as $item)
                                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Vers : {{$item->RIB}}</h5>
                                                <small>{{$item->created_at}}</small>
                                                </div>
                                                <p class="mb-1">Montant : {{$item->solde}} FCFA</p>
                                                {{-- <small class="text-body-secondary">And some muted small print.</small> --}}
                                            </a>
                                            @endforeach
                                        @else
                                            <p>Aucune activités pour le moment !</p>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Visits</h4>
                                            <div class="por-txt">96,930 Users (40%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Bounce Rate</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Unique Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Targeted  Visitors</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
@endsection
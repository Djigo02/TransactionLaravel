@extends('guichetier.layout')

@section('contenu_client')
    
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Bienvenue, {{Session::get('auth')['prenom']}} {{Session::get('auth')['nom']}} </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{Session::get('message')}}</div>
                                    @endif
                                    @if (Session::has('echec'))
                                        <div class="alert alert-danger">{{Session::get('echec')}}</div>
                                    @endif
                                    <form action="{{route('guichetier.depot')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="card-body">
                                            <!-- <canvas id="TrafficChart"></canvas>   -->
                                            <div class="form card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="">RIB</label>
                                                        <input name="rib" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Montant</label>
                                                        <input name="montant" type="number" class="form-control" min="500" max="50000000">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-info" type="submit">Recharger</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
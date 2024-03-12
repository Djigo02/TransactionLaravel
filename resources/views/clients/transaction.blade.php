@extends('clients.layout')

@section('contenu_client')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Transferer de l'argent </h4>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        
                        <div class="card">
                            <form action="{{route('comptes.transaction')}}"  class="form col-8 offset-2 mt-3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">RIB du bénéfière</label>
                                    <input id="rib" name="rib" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="fw-bold">Solde</label>
                                    <input id="solde" name="solde" type="number" min="500" class="form-control">
                                </div>
                                <button id="sendbtn" class="btn btn-info mb-3">Envoyer</button>
                            </form>
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

@endsection
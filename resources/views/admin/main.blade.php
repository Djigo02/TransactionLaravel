@extends('admin.layout')

@section('contenu_client')
    
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Bonjour Administrateur, {{Session::get('auth')['prenom']}} {{Session::get('auth')['nom']}} </h4>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success col-8 offset-2 text-center">{{Session::get('success')}}</div>
                            @endif
                            <div class="row">
                                <div class="col-lg-8">
                                    
                                    <div class="col-10 offset-1">
                                        {{-- Debut Liste --}}
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">RIB</th>
                                              <th scope="col">Type compte</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($comptes as $compte)
                                            {{-- {{$user = $compte->utilisateur}} --}}
                                            <tr>
                                                <th scope="row">{{$compte->id}}</th>
                                                <td>{{$compte->RIB}}</td>
                                                {{-- <td>{{$compte->utilisateur ? $compte->utilisateur->prenom : 'Utilisateur non trouvé'}}</td> --}}
                                                <td>{{$compte->typecompte == 1 ? "Courant" : 'Epargne'}}</td>
                                                <td>{{$compte->utilisateur ? $compte->utilisateur->email : 'Email non trouvé'}}</td>
                                                <td>
                                                    <form action="{{route('changestatus',$compte)}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-info">
                                                            @if ($compte->status==1)
                                                                Désactiver
                                                            @else
                                                                Activer
                                                            @endif
                                                        </button>
                                                    </form>
                                                </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                      </table>
                                    {{-- Fin Liste --}}
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
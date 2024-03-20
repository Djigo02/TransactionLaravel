@extends('clients.layout')

@section('contenu_client')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4 class="box-title">Mes cartes virtuelles </h4>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gencarte">
                    Creer une carte virtuelle
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="gencarte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title fs-5" id="exampleModalLabel">Creation de votre carte</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- Form start --}}
                        <form action="{{route('cartes.store')}}" class="form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                        <div class="form-group">
                            <label>Date d'expiration</label>
                            <input
                                type="text"
                                name="dateexp"
                                id="valid-thru-text"
                                class="form-control"
                                maxlength="5"
                                placeholder="02/40"
                                required
                                onkeypress="return event.charCode >=48 && event.charCode <= 57"
                            />
                        </div>
                        <div class="form-group">
                            <label>Solde</label>
                            <input
                                type="text"
                                name="solde"
                                id="valid-thru-text"
                                class="form-control"
                                maxlength="5"
                                placeholder="5000"
                                required
                            />
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Generer la carte</button>
                        </form>
                        {{-- Form End --}}
                        </div>
                    </div>
                    </div>
                </div>
                {{-- Fin modal --}}
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-body">
                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                @if (count($cartes)>0)
                                    @foreach ($cartes as $carte)
                                    <div class="card-v mb-1">
                                        <div class="intern">
                                        <img class="approximation" src="{{asset('clients/img/aprox.png')}}" alt="aproximation" />
                                        <div class="card-number">
                                            <div class="number-vl">{{$carte->numero}}</div>
                                        </div>
                                        <div class="card-holder">
                                            <label>Proprietaire</label>
                                            <div class="name-vl">{{$carte->username}}</div>
                                        </div>
                                        <div class="card-holder">
                                            <label>Solde</label>
                                            <div class="name-vl">{{$carte->solde}} FCFA</div>
                                        </div>
                                        <div class="card-infos">
                                            <div class="exp">
                                            <label>EXPIRE LE</label>
                                            <div class="expiration-vl">{{$carte->dateexp}}</div>
                                            </div>
                                            <div class="cvv">
                                            <label>CVV</label>
                                            <div class="cvv-vl">{{$carte->cvv}}</div>
                                            </div>
                                        </div>
                                        <img class="chip" src="{{asset('clients/img/chip.png')}}" alt="chip" />
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>Aucune carte pour le moment</p>
                                @endif
                                
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
<script>    
    const cardExpirationText = document.querySelector("#valid-thru-text");

    cardExpirationText.addEventListener("keyup", (e) => {
        if (!e.target.value) {
            cardExpirationText.innerHTML = "02/40";
        } else {
            const valuesOfInput = e.target.value.replace("/", "");

            if (e.target.value.length > 2) {
                e.target.value = valuesOfInput.replace(/^(\d{2})(\d{0,2})/, "$1/$2");
                cardExpirationText.innerHTML = valuesOfInput.replace(/^(\d{2})(\d{0,2})/, "$1/$2");
            } else {
                cardExpirationText.innerHTML = valuesOfInput;
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Gestion Financiere</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link current" href="#top">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Nos Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">A propos</a>
            </li>              
            <li class="nav-item">
              <a class="nav-link" href="#contactus">Nous Contacter</a>
            </li>
          </ul>
        </div>
        <div class="d-flex">
          <div class="nav-item bg-warning rounded">
            <a class="nav-link txt-white" href="{{route('sinscrire')}}">Devenir Client</a>
          </div>
          <div class="nav-item bg-success rounded ml-1">
            <a class="nav-link txt-white" href="{{route('seconnecter')}}">Se Connecter</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

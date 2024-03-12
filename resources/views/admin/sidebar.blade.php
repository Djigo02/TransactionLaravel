    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('admins')}}"><i class="menu-icon fa fa-laptop"></i>Tableau de bord </a>
                    </li>
                    <li class="">
                        {{-- <a href="{{route('mesrechargements')}}"><i class="menu-icon fa fa-send"></i>Mes rechargements </a> --}}
                    </li>
                    {{-- <li class="menu-title">Fonctionnalités</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{route('transaction')}}"><i class="menu-icon fa fa-send"></i>Transactions </a>
                    </li>
                    @if (Session::has('nbEpargne') && Session::has('nbCourant') && (Session::get('nbEpargne')==0 || Session::get('nbCourant')==0))
                        <li class="">
                            <a href="{{route('addaccount')}}"><i class="menu-icon fa fa-plus"></i>Creer un compte </a>
                        </li>
                    @endif
                    <li class="">
                        <a href="{{route('activite')}}"><i class="menu-icon fa fa-money"></i>Mes activités</a>
                    </li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
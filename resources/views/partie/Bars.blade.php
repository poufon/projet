

@section('nav')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><h1>Optima</h1></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('search.char') }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" name = "term" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('poste.create') }}">Créer Un Nouveau Poste</a></li>
                    <li><a class="dropdown-item" href="{{ '/tableau' }}">Tableau de bord</a></li>
                    <li><a class="dropdown-item" href="{{ route('decision.create') }}">Attribution du Poste Aux Emloyés</a></li>
                    <li><a class="dropdown-item" href="{{ route('poste.show') }}">Consulter les postes</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('Service.create') }}">Enregistrer un Service</a></li>
                    <li><a class="dropdown-item" href="{{ route('sevice.show') }}">Consulter  Service</a></li>
                    <li>
                        @if (Auth::check())
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@endsection
@section('sidenav')
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href={{ '/accueil' }}>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    <h6 class="fluid">Accueil</h6>
                </a>
                <div class="sb-sidenav-menu-heading fluid">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>

                    <h6 class="fluid" style="font-size: 14px"> Gestion Employé</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link fluid" href="{{ route('employee.index') }}">Afficher</a>
                        <a class="nav-link fluid" href="{{ route('employee.create') }}">Ajouter</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>

                    <h6 class="fluid"style="font-size: 14px">Gestion Contrat</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link fluid" href="{{ route('contrat.index') }}">Consulter</a>
                        <a class="nav-link fluid" href="{{ route('contrat.create') }}">Enregistrer</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>

                    <h6 class="fluid"style="font-size: 14px">Gestion Horaire</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link fluid" href="{{ route('horraire.create') }}">Planification</a>
                        <a class="nav-link fluid" href="{{ route('horraire.index') }}">Agenda</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>

                    <h6 class="fluid"style="font-size: 14px">Gestion Congé</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link fluid" href="{{ route('conge.index') }}">Consulter</a>
                        <a class="nav-link fluid" href="{{ route('CongeAnnuel.create') }}">Etablir un titre de Congé</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></i></div>

                    <h6 class="fluid"style="font-size: 14px">Gestion Utilisateur</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('users.index') }}">Consuter</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading fluid">Observation</div>
                <a class="nav-link" href={{ route('permissionEmploye.index') }}>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>

                    <h6 class="fluid">Permission</h6>
                </a>
                <a class="nav-link" href="{{ route('retard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>

                    <h6 class="fluid">Retard</h6>
                </a>
                <a class="nav-link" href="{{ route('absence.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>

                    <h6 class="fluid">Absence</h6>
                </a>
                <a class="nav-link" href="{{ route('sanction.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>

                    <h6 class="fluid">Sanction</h6>
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>

                    <h6 class="fluid">Option</h6>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link fluid" href="{{ route('retard.create') }}">Enregistrer un retard</a>
                        <a class="nav-link fluid" href="{{ route('sanction.create') }}">Enregistrer une sanction</a>
                        <a class="nav-link fluid" href="{{ route('absence.create') }}">Enregistrer ue absence</a>
                    </nav>
                </div>
                <p></p>
            </div>
        </div>
    </nav>
@endsection

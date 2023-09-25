<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b><h1>Optima</h1></b></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarColor02" style="margin-left:5rem;">
          <ul class="navbar-nav me-auto">
            <li class="nav-item active">
             <a class="nav-link text-light" href="/">Accueil<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('employee.index') }}">Gestion employés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('contrat.index') }}">Gestion Contrat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('horraire.index') }}">Gestion Horaire</a>
              </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ '/tableau' }}">Tableau de bord</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Service
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
                  {{-- <a class="dropdown-item" href="#">Etablir un document </a> --}}
                  <a class="dropdown-item " href="{{ route('fichePaie.show') }}">Gestion de paie</a>

                    <a href="{{ route('poste.create') }}" class="dropdown-item "><main>Créer  Un Nouveau Poste</main>
                    </a>
                    <a href="{{ route('decision.create') }}" class="dropdown-item "><main>Attribution du Poste</main>
                   </a>
                   <a href="{{ route('Service.create') }}" class="dropdown-item "><main>Enregistrer un Service</main>
                   </a>
                   <a class="dropdown-item " href="{{ route('CongeAnnuel.create') }}">Etablir un titre de Congé</a>
                    <b>
                  {{-- <a class="dropdown-item" href="{{ route('stagiaire.index') }}">Stagiaire</a> --}}
                  <a class="dropdown-item " href="{{ route('users.index') }}">Gestion utilisateur</a>
                  <a class="dropdown-item " href="{{ route('permissionEmploye.index') }}">Permission</a>
                  <a class="dropdown-item " href="{{ route('poste.show') }}">afficher poste</a>
                  <a class="dropdown-item " href="{{ route('permissionStagiaire.index') }}">Observation</a>

                </div>
            </li>
            <div>
            </ul>
        </div>
    </div>
</nav>


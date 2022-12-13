<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('ajout_enseignant') }}">Ajouter enseignant(e)</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route( 'enseignants' ) }}">Liste des enseignants</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route( 'ecs' ) }}">E.C</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route( 'enseignants' ) }}" method="get">

            @csrf

            <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Recherche">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
</nav>

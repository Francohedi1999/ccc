<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('ajout_regroupement') }}">Ajouter nouveau regroupement</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('regroupements') }}">Liste des regroupements validés</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Validation regroupement</a>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content p-4">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('validation_regroupement') }}" method="get">

                                @csrf

                                <label for="date_reg">Date de regroupement :</lable>
                                <input class="form-control mr-sm-2 mx-2" type="date" name="date_reg">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Afficher</button>
                            </form>
                      </div>
                    </div>
                </div>

            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('regroupements') }}" method="get">

            @csrf

            <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Recherche">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
</nav>

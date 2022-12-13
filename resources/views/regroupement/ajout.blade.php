@extends("layout.template")

@section("contenu")

    @include("regroupement.navigation")

    @if( session()->has("success") )
        <div class="alert alert-success mt-2" role="alert">
            {{ session()->get("success") }}
        </div>
    @endif

    <form action="{{ route('save_regroupement') }}"  method="post" id="regroupement">

    @csrf

    <div class="form-row mt-4">

            <div class="col-md-6">
                <label for="niv_id">Niveau</label><br>

                <select name="niv_id" id="niv_id" class="form-control">
                    <option value=""></option>
                    @foreach( $niveaux as $niveaux_ )
                    <option value="{{ $niveaux_->id }}">{{ $niveaux_->niv }}</option>
                    @endforeach
                </select>
                @error('niv_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror

            </div>

            <div class="col-md-3">
                <label for="sem_id">Semestre</label><br>

                @foreach( $semestres as $semestres_ )
                    <div class="form-check form-check-inline" id="{{ $semestres_->sem }}">
                        <input class="form-check-input" type="radio" name="sem_id" id="sem_id" value="{{ $semestres_->id }}">
                        <label class="form-check-label" for="sem_id">{{ $semestres_->sem }}</label>
                    </div>
                @endforeach
                @error('sem_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror

            </div>

            <div class="col-md-3">
                <label for="p_id">Parcours</label><br>

                @foreach( $parcours as $parcours_ )
                <div class="form-check form-check-inline" id="p_{{ $parcours_->id }}">
                    <input class="form-check-input" type="radio" name="p_id" id="p_id" value="{{ $parcours_->id }}">
                    <label class="form-check-label" for="p_id">{{ $parcours_->p }}</label>
                </div>
                @endforeach
                @error('p_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>

    </div>

    <div class="form-row mt-4">

        <div class="col-md-6">
            <label for="date_reg">Date</label>
            <input type="date" class="form-control" name="date_reg" id="date_reg">
            @error('date_reg')
                <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="h_reg_1">Heure</label>
            <input type="time" class="form-control" name="h_reg_1" id="h_reg_1">
            @error('h_reg_1')
                <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="h_reg_2">à</label>
            <input type="time" class="form-control" name="h_reg_2" id="h_reg_2">
            @error('h_reg_2')
                <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="form-row mt-4">

        <div class="col">
            <label for="ec_ens_id">Elément constitutif</label>
            <select name="ec_ens_id" id="ec_ens_id" class="form-control">
                <option value=""></option>
                @foreach( $ec_ens as $ec_ens_ )
                    <option value="{{ $ec_ens_->id."|".$ec_ens_->ens_id."|".$ec_ens_->nom." ".$ec_ens_->prenom }}">{{ $ec_ens_->ec }}</option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <label for="ens">Enseignant</label>
            <input type="text" class="form-control" name="ens" id="ens" disabled>
        </div>

    </div>
    @error('ec_ens_id')
        <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
    @enderror

    <div class="form-row mt-4">

        <div class="col">
            <label for="salle_id">Salle</label>
            <select name="salle_id" id="salle_id" class="form-control">
                <option value=""></option>
                @foreach( $salles as $salles_ )
                    <option value="{{ $salles_->id }}">{{ $salles_->salle }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="salle" id="salle" placeholder="Nouvelle salle">
                    
        </div>

    </div>

    <div class="form-row my-4">
            <div class="col">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_reg">
                    Enregistrer
                </button>
                <a class="btn btn-danger" href="{{ route('regroupements') }}">Quitter</a>

                <div class="modal fade" id="exampleModal_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous enregistrer?</h5>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Oui">
                          <a class="btn btn-danger" href="{{ route( 'ajout_regroupement' ) }}">Non</a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

@endsection
@extends("layout.template")

@section("contenu")

    @include("ec.navigation")

    @if( session()->has("success") )
        <div class="alert alert-success mt-2" role="alert">
            {{ session()->get("success") }}
        </div>
    @endif

    <form action="{{ route('update_ec') }}"  method="post" id="ec_ens">

        @csrf

        <div class="form-row mt-4">

            <div class="col">
                <label for="ens_id">Element constitutif</label><br>

                <select name="elc_id" id="elc_id" class="form-control">
                    <option value=""></option>
                    @foreach( $ecs as $ecs_ )
                        @if ( $ecs_->id == $ec_ens->elc_id )
                            <option value="{{ $ecs_->id }}" selected>{{ $ecs_->ec }}</option>
                        @else
                            <option value="{{ $ecs_->id }}">{{ $ecs_->ec }}</option>
                        @endif
                    @endforeach
                </select>

                <input type="hidden" class="form-control" name="id" id="id" value="{{ $ec_ens->id }}">
                <input type="text" class="form-control" name="ec" id="ec" placeholder="Nouveau élément constitutif">

                @error('ec')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
                @error('elc_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
                
            </div>

        </div>

        <div class="form-row mt-4">
            <div class="col">
                <label for="ens_id">Enseignant(e)</label><br>

                <select name="ens_id" id="ens_id" class="form-control">
                    <option value=""></option>
                    @foreach( $enseignants as $enseignants_ )
                        @if( $enseignants_->id == $ec_ens->ens_id )
                            <option value="{{ $enseignants_->id }}" selected>{{ $enseignants_->nom." ".$enseignants_->prenom }}</option>
                        @else
                            <option value="{{ $enseignants_->id }}">{{ $enseignants_->nom." ".$enseignants_->prenom }}</option>
                        @endif
                    @endforeach
                </select>
                @error('ens_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror

            </div>
        </div>

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
                    <div class="form-check form-check-inline"  id="{{ $semestres_->sem }}">
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

            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="vh">Volume horaire</label><br>

                <select name="vh" id="vh" class="form-control">
                    <option value=""></option>
                    @for( $i = 10 ; $i < 100 ; $i += 5)
                        @if($i == $ec_ens->vh)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                @error('vh')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror

            </div>
            <div class="col">
                <label for="credit">Crédit 10% du volume horaire</label><br>
                <input type="text" class="form-control" name="credit" id="credit" value="{{ round( $ec_ens->credit ) }}">
                @error('credit')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <div class="form-row my-4">
            <div class="col">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_edit_ec">
                    Modifier
                </button>
                <a class="btn btn-danger" href="{{ route('enseignants') }}">Quitter</a>

                <div class="modal fade" id="exampleModal_edit_ec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous modifier?</h5>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Oui">
                          <a class="btn btn-danger" href="{{ route( 'ajout_ec' ) }}">Non</a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection

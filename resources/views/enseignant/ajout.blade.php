@extends("layout.template")

@section("contenu")

    @include("enseignant.navigation")

    @if( session()->has("success") )
        <div class="alert alert-success mt-2" role="alert">
            {{ session()->get("success") }}
        </div>
    @endif

    <form action="{{ route('save_enseignant') }}"  method="post">

        @csrf

        <div class="form-row mt-4">
            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control">
                @error('nom')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="prenom">Prénom(s)</label>
                <input type="text" name="prenom" class="form-control">
                @error('prenom')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="code_id">Code</label><br>

                @foreach( $codes as $codes_ )
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="code_id" id="code_id" value="{{ $codes_->id }}">
                        <label class="form-check-label" for="code_id">{{ $codes_->code }}</label>
                    </div>
                @endforeach

                @error('code_id')
                    <p class="alert-danger rounded mt-4 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="grade_id">Grade</label>
                <select name="grade_id" class="form-control">

                    <option value=""></option>
                    @foreach( $grades as $grades_ )
                    <option value="{{ $grades_->id }}">{{ $grades_->grade }}</option>
                    @endforeach

                </select>
                @error('grade_id')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="im">IM</label>
                <input type="text" name="im" class="form-control">
                @error('im')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="cin">CIN</label>
                <input type="text" name="cin" class="form-control">
                @error('cin')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control">
                @error('adresse')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control">
                @error('contact')
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row my-4">
            <div class="col">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_ens">
                    Enregistrer
                </button>
                <a class="btn btn-danger" href="{{ route('enseignants') }}">Quitter</a>

                <div class="modal fade" id="exampleModal_ens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous enregistrer?</h5>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Oui">
                          <a class="btn btn-danger" href="{{ route( 'ajout_enseignant' ) }}">Non</a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection

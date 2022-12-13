@extends("layout.template")

@section("contenu")

    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h3>Se connecter</h3>
            @if( session()->has("erreur") )
                <div class="alert alert-danger" role="alert">
                    {{ session()->get("erreur") }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">

                @csrf

                <div class="form-group">
                    <label for="mdp">Veuiller insérer le mot de passe</label>
                    <input type="password" name="mdp" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Se connecter" class="btn btn-success">
                </div>
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>

@endsection

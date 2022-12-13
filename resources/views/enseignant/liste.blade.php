@extends("layout.template")

@section("contenu")

    @include("enseignant.navigation")
    <div class="row">
    <div class="col-sm-12 col-lg-12">
    <table class="table table-bordered table-hover my-4">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom et prénom(s)</th>
                <th>IM</th>
                <th>CIN</th>
                <th>E-mail</th>
                <th>Adresse</th>
                <th>Contact</th>
                <th>Code et grade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $enseignants as $enseignants_ )
                <tr>
                    <td>{{ "ENS".$enseignants_->id }}</td>
                    <td>{{ $enseignants_->nom." ".$enseignants_->prenom }}</td>
                    <td>{{ $enseignants_->im }}</td>
                    <td>{{ $enseignants_->cin }}</td>
                    <td>{{ $enseignants_->email }}</td>
                    <td>{{ $enseignants_->adresse }}</td>
                    <td>{{ $enseignants_->contact }}</td>
                    <td>{{ "Code : ".$enseignants_->code->code }} <br> {{ "Grade : ".$enseignants_->grade->grade }}</td>
                    <td>
                        <a href="{{ route('edit_enseignant' , [ 'id'=>$enseignants_->id ]) }}" class="btn btn-secondary">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $enseignants->links() }}</div>
    </div>
    

@endsection

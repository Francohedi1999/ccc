@extends("layout.template")

@section("contenu")

    @include("ec.navigation")

    <table class="table table-bordered table-hover my-4">
        <thead>
            <tr>
                <th>N°</th>
                <th>Elément constitutif</th>
                <th>Niveau</th>
                <th>Semestre</th>
                <th>Parcours</th>
                <th>Enseignant(e)</th>
                <th>Volume horaire</th>
                <th>Crédit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $ecs_ens as $ecs_ens_ )
                <tr>
                    <td>{{ "EC".$ecs_ens_->id }}</td>
                    <td>{{ $ecs_ens_->ec }}</td>
                    <td>{{ $ecs_ens_->niv }}</td>
                    <td>{{ $ecs_ens_->sem }}</td>
                    <td>{{ $ecs_ens_->p }}</td>
                    <td>{{ $ecs_ens_->nom." ".$ecs_ens_->prenom }}</td>
                    <td>{{ $ecs_ens_->vh }}</td>
                    <td>{{ round( $ecs_ens_->credit ) }}</td>
                    <td>
                        <a href="{{ route('edit_ec' , [ 'id'=>$ecs_ens_->id ]) }}" class="btn btn-secondary">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ecs_ens->links() }}

@endsection


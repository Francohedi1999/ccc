@extends("layout.template")

@section("contenu")

    @include("regroupement.navigation")

    <table class="table table-bordered table-hover my-4">
        <thead>
            <tr>
                <th>N°</th>
                <th>Niveau</th>
                <th>Semestre</th>
                <th>Parcours</th>
                <th>Date</th>
                <th>Heure</th>
                <th>EC</th>
                <th>Enseignant(e)</th>
                <th>Salle</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach( $regroupements as $regroupements_ )
                <tr>
                    <td>{{ "REG".$regroupements_->id }}</td>
                    <td>{{ $regroupements_->niv }}</td>
                    <td>{{ $regroupements_->sem }}</td>
                    <td>{{ $regroupements_->p }}</td>
                    <td>{{ date( "d-m-Y" , strtotime($regroupements_->date_reg) ) }}</td>
                    <td>{{ $regroupements_->h_reg_1." à ".$regroupements_->h_reg_2 }}</td>
                    <td>{{ $regroupements_->ec }}</td>
                    <td>{{ $regroupements_->nom." ".$regroupements_->prenom }}</td>
                    <td>{{ $regroupements_->salle }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $regroupements->links() }}

@endsection
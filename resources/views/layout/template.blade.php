<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
    <title>{{ $title }}</title>
</head>
<body>

    <div class="container_grid">

		<header><h2>{{ $title }}</h2></header>

		<nav class="d-flex">
			@if( session()->has( 'data' ) )

                <ul class="list_menu">

                    <div class="dropdown">
                        <li class="btn-outline-secondary p-2"><a href="{{ route( 'enseignants' ) }}"><h5>Enseignant</h5></a></li>
                        <div class="dropdown-content">
                            <li class="btn-outline-dark p-2"><a href="{{ route( 'enseignants' ) }}"><h5>Liste</h5></a></li>
                            <li class="btn-outline-dark p-2"><a href="{{ route( 'regroupements' ) }}"><h5>Regroupement</h5></a></li>
                            <li class="btn-outline-dark p-2"><a href="#"><h5>Vacation</h5></a></li>
                        </div>
                    </div>

                    <div class="dropdown">
                        <li class="btn-outline-secondary p-2"><a href="#"><h5>Etudiant</h5></a></li>
                    </div>

                    <div class="dropdown">
                        <li class="btn-outline-secondary p-2"><a href="#"><h5>Lettre</h5></a></li>
                    </div>

                    <div class="dropdown">
                        <li class="btn-outline-secondary p-2"><a href="#"><h5>Autre</h5></a></li>
                    </div>

                    <div class="dropdown">
                        <li class="btn-outline-danger p-2"><a href="{{ route( 'logout' ) }}"><h5>Se déconnecter</h5></a></li>
                    </div>

                </ul>

            @endif
		</nav>

		<main>
            @yield("contenu")
		</main>

	</div>

</body>
<script src=" {{ asset('js/app.js') }} "></script>
<script src=" {{ asset('js/jquery.min.js') }} "></script>
<script src=" {{ asset('js/functions.js') }} "></script>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo e(asset('css/app.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('css/style.css')); ?> ">
    <title><?php echo e($title); ?></title>
</head>
<body>

    <div class="container_grid">

		<header><h2><?php echo e($title); ?></h2></header>

		<nav>
			<?php if( session()->has( 'data' ) ): ?>

                <ul class="list_menu">

                    <div class="dropdown">
                        <li class="btn-outline-secondary p-2"><a href="<?php echo e(route( 'enseignants' )); ?>"><h5>Enseignant</h5></a></li>
                        <div class="dropdown-content">
                            <li class="btn-outline-dark p-2"><a href="<?php echo e(route( 'enseignants' )); ?>"><h5>Liste</h5></a></li>
                            <li class="btn-outline-dark p-2"><a href="#"><h5>Regroupement</h5></a></li>
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
                        <li class="btn-outline-danger p-2"><a href="<?php echo e(route( 'logout' )); ?>"><h5>Se déconnecter</h5></a></li>
                    </div>

                </ul>

            <?php endif; ?>
		</nav>

		<main>
            <?php echo $__env->yieldContent("contenu"); ?>
		</main>

	</div>

</body>
<script src=" <?php echo e(asset('js/app.js')); ?> "></script>
<script src=" <?php echo e(asset('js/jquery.min.js')); ?> "></script>
<script src=" <?php echo e(asset('js/functions.js')); ?> "></script>
</html>
<?php /**PATH C:\xampp\htdocs\EGS\egs\resources\views/layout/template.blade.php ENDPATH**/ ?>
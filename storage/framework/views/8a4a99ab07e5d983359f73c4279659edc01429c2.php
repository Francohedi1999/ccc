<?php $__env->startSection("contenu"); ?>

    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h3>Se connecter</h3>
            <?php if( session()->has("erreur") ): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session()->get("erreur")); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('login')); ?>" method="post">

                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="mdp">Veuiller insérer le mot de passe</label>
                    <input type="password" name="mdp" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Ok" class="btn btn-success">
                </div>
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\EGS\egs\resources\views/login.blade.php ENDPATH**/ ?>
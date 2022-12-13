<?php $__env->startSection("contenu"); ?>

<p class="text-success">Login Success</p>
<h6><?php echo e(session('data')['mdp']); ?></h6>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\EGS\egs\resources\views/profil.blade.php ENDPATH**/ ?>
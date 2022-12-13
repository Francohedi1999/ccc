<?php $__env->startSection("contenu"); ?>

    <?php echo $__env->make("ec.navigation", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
            <?php $__currentLoopData = $ecs_ens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecs_ens_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e("EC".$ecs_ens_->id); ?></td>
                    <td><?php echo e($ecs_ens_->ec); ?></td>
                    <td><?php echo e($ecs_ens_->niv); ?></td>
                    <td><?php echo e($ecs_ens_->sem); ?></td>
                    <td><?php echo e($ecs_ens_->p); ?></td>
                    <td><?php echo e($ecs_ens_->nom." ".$ecs_ens_->prenom); ?></td>
                    <td><?php echo e($ecs_ens_->vh); ?></td>
                    <td><?php echo e(round( $ecs_ens_->credit )); ?></td>
                    <td>
                        <a href="<?php echo e(route('edit_ec' , [ 'id'=>$ecs_ens_->id ])); ?>" class="btn btn-secondary">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($ecs_ens->links()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\EGS\egs\resources\views/ec/liste.blade.php ENDPATH**/ ?>
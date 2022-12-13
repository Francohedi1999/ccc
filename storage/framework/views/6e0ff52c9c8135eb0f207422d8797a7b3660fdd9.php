

<?php $__env->startSection("contenu"); ?>

    <?php echo $__env->make("regroupement.navigation", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( session()->has("success") ): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo e(session()->get("success")); ?>

        </div>
    <?php endif; ?>

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
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php $__currentLoopData = $regroupements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regroupements_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e("REG".$regroupements_->id); ?></td>
                    <td><?php echo e($regroupements_->niv); ?></td>
                    <td><?php echo e($regroupements_->sem); ?></td>
                    <td><?php echo e($regroupements_->p); ?></td>
                    <td><?php echo e(date( "d-m-Y" , strtotime( $regroupements_->date_reg ) )); ?></td>
                    <td><?php echo e($regroupements_->h_reg_1." à ".$regroupements_->h_reg_2); ?></td>
                    <td><?php echo e($regroupements_->ec); ?></td>
                    <td><?php echo e($regroupements_->nom." ".$regroupements_->prenom); ?></td>
                    <td><?php echo e($regroupements_->salle); ?></td>
                    <td>
                        <a href="<?php echo e(route('valide_regroupement' , [ 'id' => $regroupements_->id ])); ?>" class="btn btn-success">Valider</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\EGS\egs\resources\views/regroupement/validation_regroupement.blade.php ENDPATH**/ ?>
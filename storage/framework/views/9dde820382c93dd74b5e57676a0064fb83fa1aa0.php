<?php $__env->startSection("contenu"); ?>

    <?php echo $__env->make("enseignant.navigation", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignants_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e("ENS".$enseignants_->id); ?></td>
                    <td><?php echo e($enseignants_->nom." ".$enseignants_->prenom); ?></td>
                    <td><?php echo e($enseignants_->im); ?></td>
                    <td><?php echo e($enseignants_->cin); ?></td>
                    <td><?php echo e($enseignants_->email); ?></td>
                    <td><?php echo e($enseignants_->adresse); ?></td>
                    <td><?php echo e($enseignants_->contact); ?></td>
                    <td><?php echo e("Code : ".$enseignants_->code->code); ?> <br> <?php echo e("Grade : ".$enseignants_->grade->grade); ?></td>
                    <td>
                        <a href="<?php echo e(route('edit_enseignant' , [ 'id'=>$enseignants_->id ])); ?>" class="btn btn-secondary">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($enseignants->links()); ?></div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\EGS\egs\resources\views/enseignant/liste.blade.php ENDPATH**/ ?>
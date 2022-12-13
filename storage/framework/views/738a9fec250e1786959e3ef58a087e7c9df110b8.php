<?php $__env->startSection("contenu"); ?>

    <?php echo $__env->make("enseignant.navigation", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( session()->has("success") ): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo e(session()->get("success")); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('save_enseignant')); ?>"  method="post">

        <?php echo csrf_field(); ?>

        <div class="form-row mt-4">
            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control">
                <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col">
                <label for="prenom">Prénom(s)</label>
                <input type="text" name="prenom" class="form-control">
                <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="code_id">Code</label><br>

                <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codes_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="code_id" id="code_id" value="<?php echo e($codes_->id); ?>">
                        <label class="form-check-label" for="code_id"><?php echo e($codes_->code); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__errorArgs = ['code_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-4 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col">
                <label for="grade_id">Grade</label>
                <select name="grade_id" class="form-control">

                    <option value=""></option>
                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grades_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($grades_->id); ?>"><?php echo e($grades_->grade); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
                <?php $__errorArgs = ['grade_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="im">IM</label>
                <input type="text" name="im" class="form-control">
                <?php $__errorArgs = ['im'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col">
                <label for="cin">CIN</label>
                <input type="text" name="cin" class="form-control">
                <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control">
                <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control">
                <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-row my-4">
            <div class="col">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_ens">
                    Enregistrer
                </button>
                <a class="btn btn-danger" href="<?php echo e(route('enseignants')); ?>">Quitter</a>

                <div class="modal fade" id="exampleModal_ens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous enregistrer?</h5>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Oui">
                          <a class="btn btn-danger" href="<?php echo e(route( 'ajout_enseignant' )); ?>">Non</a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\EGS\egs\resources\views/enseignant/ajout.blade.php ENDPATH**/ ?>
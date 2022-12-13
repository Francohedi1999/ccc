<?php $__env->startSection("contenu"); ?>

    <?php echo $__env->make("ec.navigation", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( session()->has("success") ): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo e(session()->get("success")); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('save_ec')); ?>"  method="post" id="ec_ens">

        <?php echo csrf_field(); ?>

        <div class="form-row mt-4">

            <div class="col">
                <label for="ens_id">Element constitutif</label><br>

                <select name="elc_id" id="elc_id" class="form-control">
                    <option value=""></option>
                    <?php $__currentLoopData = $ecs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecs_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ecs_->id); ?>"><?php echo e($ecs_->ec); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <input type="text" class="form-control" name="ec" id="ec" placeholder="Nouveau élément constitutif">

                <?php $__errorArgs = ['ec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="alert-danger rounded mt-2 px-2 py-1" role="alert"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['elc_id'];
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
                <label for="ens_id">Enseignant(e)</label><br>

                <select name="ens_id" id="ens_id" class="form-control">
                    <option value=""></option>
                    <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignants_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($enseignants_->id); ?>"><?php echo e($enseignants_->nom." ".$enseignants_->prenom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['ens_id'];
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
            <div class="col-md-6">
                <label for="niv_id">Niveau</label><br>

                <select name="niv_id" id="niv_id" class="form-control">
                    <option value=""></option>
                    <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $niveaux_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($niveaux_->id); ?>"><?php echo e($niveaux_->niv); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['niv_id'];
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
            <div class="col-md-3">
                <label for="sem_id">Semestre</label><br>

                <?php $__currentLoopData = $semestres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semestres_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check form-check-inline" id="<?php echo e($semestres_->sem); ?>">
                    <input class="form-check-input" type="radio" name="sem_id" id="sem_id" value="<?php echo e($semestres_->id); ?>">
                    <label class="form-check-label" for="sem_id"><?php echo e($semestres_->sem); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__errorArgs = ['sem_id'];
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
            <div class="col-md-3">
                <label for="p_id">Parcours</label><br>

                <?php $__currentLoopData = $parcours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcours_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check form-check-inline" id="p_<?php echo e($parcours_->id); ?>">
                    <input class="form-check-input" type="radio" name="p_id" id="p_id" value="<?php echo e($parcours_->id); ?>">
                    <label class="form-check-label" for="p_id"><?php echo e($parcours_->p); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <label for="vh">Volume horaire</label><br>

                <select name="vh" id="vh" class="form-control">
                    <option value=""></option>
                    <?php for( $i = 10 ; $i < 100 ; $i += 5): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
                <?php $__errorArgs = ['vh'];
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
                <label for="credit">Crédit 10% du volume horaire</label><br>
                <input type="text" class="form-control" name="credit" id="credit">
                <?php $__errorArgs = ['credit'];
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

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_ec">
                    Enregistrer
                </button>
                <a class="btn btn-danger" href="<?php echo e(route('enseignants')); ?>">Quitter</a>

                <div class="modal fade" id="exampleModal_ec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous enregistrer?</h5>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Oui">
                          <a class="btn btn-danger" href="<?php echo e(route( 'ajout_ec' )); ?>">Non</a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\EGS\egs\resources\views/ec/ajout.blade.php ENDPATH**/ ?>

<?php $__env->startSection('css'); ?>
<style></style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
    <div class="row">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form  action="<?php echo e(route('admin.wordbook.update', $edit->id)); ?>" method="post">
                <?php echo csrf_field(); ?> 
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Word <a href="<?php echo e(url()->previous()); ?>"><span class="button gray">Back</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">                            
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="bengali_word"><strong><?php echo e(__('Bengali Word')); ?></strong></label>                           
                                    <input id="bengali_word" name="bengali_word" type="text" value="<?php echo e($edit->bengali_word); ?>" class="form-control <?php $__errorArgs = ['bengali_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="bengali_word" autofocus>
                                        <?php $__errorArgs = ['bengali_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="arabic_word"><strong><?php echo e(__('Arabic Word')); ?></strong></label>                           
                                    <input id="arabic_word" name="arabic_word" type="text" value="<?php echo e($edit->arabic_word); ?>" class="form-control <?php $__errorArgs = ['arabic_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="arabic_word" autofocus>
                                        <?php $__errorArgs = ['arabic_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="english_word"><strong><?php echo e(__('English Word')); ?></strong></label>                           
                                    <input id="english_word" name="english_word" type="text" value="<?php echo e($edit->english_word); ?>" class="form-control <?php $__errorArgs = ['english_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="english_word" autofocus>
                                        <?php $__errorArgs = ['english_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                </div>
                              
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="book_name"><strong><?php echo e(__('Book Name')); ?></strong></label>
                                    <input id="book_name" name="book_name" type="text" value="<?php echo e($edit->book_name); ?>" class="form-control <?php $__errorArgs = ['book_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus><br>
                                        <?php $__errorArgs = ['book_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="lesson_name"><strong><?php echo e(__('Lesson No')); ?></strong></label>
                                    <input id="lesson_name" name="lesson_name" type="text" value="<?php echo e($edit->lesson_name); ?>" class="form-control <?php $__errorArgs = ['lesson_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus>
                                        <?php $__errorArgs = ['lesson_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="lesson_name"><strong>&nbsp;</strong></label>
                                    <button type="submit" class="button"><?php echo e(__('Update')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>                       
                </div>
            </div>           
        </form>
    </div>
</div>      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/wordbook/edit.blade.php ENDPATH**/ ?>
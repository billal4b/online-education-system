<?php $__env->startSection('css'); ?>
    <style></style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>

    <div class="dashboard-form">
        <div class="row">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('admin.arabic-dictionary.update', $edit->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Update Word <a href="<?php echo e(url('/admin/arabic-dictionary')); ?>"><span
                                        class="button gray">Back</span></a></h4>
                        <div class="dashboard-list-box-static">
                            <!-- Details -->
                            <div class="my-profile">
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="bengali_word"><strong><?php echo e(__('Bengali Word')); ?></strong></label>
                                        <input id="bengali_word" name="bengali_word" type="text"
                                               value="<?php echo e($edit->bengali_word); ?>"
                                               class="form-control <?php $__errorArgs = ['bengali_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                                               autocomplete="bengali_word" autofocus>
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
                                        <input id="arabic_word" name="arabic_word" type="text"
                                               value="<?php echo e($edit->arabic_word); ?>"
                                               class="form-control <?php $__errorArgs = ['arabic_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                                               autocomplete="arabic_word" autofocus>
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
                                        <input id="english_word" name="english_word" type="text"
                                               value="<?php echo e($edit->english_word); ?>"
                                               class="form-control <?php $__errorArgs = ['english_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               autocomplete="english_word" autofocus>
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
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="subject"><strong><?php echo e(__('Lesson No')); ?></strong></label>
                                        <input id="lesson_no" name="lesson_no" type="hidden"
                                               value="<?php echo e($edit->lesson_no); ?>" class="form-control">
                                        <select name="subject" id="subject" style="height: 35px" class="form-control">
                                            <option><?php echo e($edit->lesson_no); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['lesson_no'];
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
                                        <label for="total_mentioned"><strong><?php echo e(__('Total Mentioned')); ?></strong></label>
                                        <input id="total_mentioned" name="total_mentioned" type="text"
                                               value="<?php echo e($edit->total_mentioned); ?>"
                                               class="form-control <?php $__errorArgs = ['total_mentioned'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               autocomplete="total_mentioned" autofocus>
                                        <?php $__errorArgs = ['total_mentioned'];
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
    <link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
    <script>
        $('#subject').select2({
            theme: "bootstrap",
            tags: true,
            allowClear: true,
            placeholder: 'Type Subject',
            minimumInputLength: 0,
            ajax: {
                url: '<?php echo e(route('dictionary.quarnic.subject.search')); ?>',
                dataType: 'json'
            }
        }).on('change', function (e) {
            let sub = $(this).find(":selected").text();
            $('#lesson_no').val(sub)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/arabic-dictionary/edit.blade.php ENDPATH**/ ?>
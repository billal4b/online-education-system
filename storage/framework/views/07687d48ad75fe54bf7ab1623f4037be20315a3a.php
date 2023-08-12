
<?php $__env->startSection('css'); ?>
<style>
    #gender-margin {margin-left: 20px; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="dashboard-form">
    <div class="row">
        <form  action="<?php echo e(route('admin.todayclass.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="dashboard-list-box">
                <h4 class="gray">Update Today Class <a href="<?php echo e(route('admin.todayclass')); ?>" ><span class="button gray">Back</span></a></h4>
                <div class="dashboard-list-box-static">
                    <!-- Details -->
                    <div class="my-profile">

                        <label for="video_title"><strong><?php echo e(__('Video Title')); ?></strong></label>
                        <input id="video_title" name="video_title" type="text" value="<?php echo e($edit->video_title); ?>" class="form-control <?php $__errorArgs = ['video_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="video_title" autofocus>
                            <?php $__errorArgs = ['video_title'];
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
                        <label for="video_url_id"><strong><?php echo e(__('YouTube Video ID')); ?></strong></label>
                        <input id="video_url_id" name="video_url_id" type="text" value="<?php echo e($edit->video_url_id); ?>" class="form-control <?php $__errorArgs = ['video_url_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="video_url_id" autofocus>

                        <?php $__errorArgs = ['video_url_id'];
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
                        <div class="form-group">
                            <label><strong>Select Courses :</strong></label>
                            <select name="course_id" id="course_id" class="form-control">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>"><?php echo e($v); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="gender"><strong><?php echo e(__('Gender :')); ?></strong></label>
                            <div id="gender-margin">
                                <input type="radio" name="gender" id="gender" value="male" <?php echo e($edit->gender == 'male' ? 'checked' : ''); ?>> Male &nbsp;
                                <input type="radio" name="gender" id="gender" value="female" <?php echo e($edit->gender == 'female' ? 'checked' : ''); ?>> Female
                            </div>
                        </div>
                        <label for="order"><strong><?php echo e(__('Order')); ?></strong> <span>(Optional)</span></label>
                        <input id="order" name="order" type="number" value="<?php echo e($edit->order); ?>" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  autocomplete="order" autofocus>
                            <?php $__errorArgs = ['order'];
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

                        <label for="is_active"><strong><?php echo e(__('Publication Status')); ?></strong></label>
                        <select id="type" name="is_active" class="form-control">
                            <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Publish</option>
                            <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Unpublish</option>
                        </select>
                    </div>
                    <button type="submit" class="button"><?php echo e(__('Update')); ?></button>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
document.getElementById('course_title').value = '<?php echo e($edit->course_title); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/today_class/edit.blade.php ENDPATH**/ ?>
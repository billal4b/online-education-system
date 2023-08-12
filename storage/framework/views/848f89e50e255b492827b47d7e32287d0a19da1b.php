<?php $__env->startSection('css'); ?>
<style>
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Change Your Password <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
<section id="mt_contact" class="contact-main section-inner body-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="<?php echo e(route('admin.change.password')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="form-group row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-8">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-danger"><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="current_password" required placeholder="Current Password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password (at least 6 characters)</label>
                        <div class="col-md-8">
                            <input id="new_password" type="password" class="form-control" name="new_password" required placeholder="New Password " autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                        <div class="col-md-8">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" required placeholder="Confirm Password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="mt_btn_yellow">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/users/password_change.blade.php ENDPATH**/ ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="dashboard-form">
    <div class="row">
        <form  action="<?php echo e(route('admin.ebook.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="dashboard-list-box">
                <h4 class="gray">Update eBook <a href="<?php echo e(url()->previous()); ?>"><span class="button gray">List</span></a></h4>
                <div class="dashboard-list-box-static">
                    <!-- Details -->
                    <div class="my-profile">
                        <label for="course_title"><strong><?php echo e(__('Course Name')); ?></strong></label>
                            <input id="course_title" name="course_title" type="text" value="<?php echo e($edit->course_title); ?>" class="form-control <?php $__errorArgs = ['course_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autofocus>
                                <?php $__errorArgs = ['course_title'];
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

                        <label for="subject"><strong><?php echo e(__('Subject')); ?></strong></label>
                        <input id="subject" name="subject" type="text"  value="<?php echo e($edit->subject); ?>" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autofocus>
                            <?php $__errorArgs = ['subject'];
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
                        <label for="subject_code"><strong><?php echo e(__('Subject Code')); ?></strong></label>
                        <input id="subject_code" name="subject_code" type="text"  value="<?php echo e($edit->subject_code); ?>" class="form-control <?php $__errorArgs = ['subject_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  autofocus>
                            <?php $__errorArgs = ['subject_code'];
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
                        <label for="content"><strong><?php echo e(__('Content')); ?></strong></label>
                        <textarea id="content" name="content" class="form-control tinymce <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>  <?php echo e($edit->content); ?></textarea><br>
                            <?php $__errorArgs = ['content'];
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
                            <label for="section"><strong><?php echo e(__('Section')); ?></strong></label>
                            <select name="section" id="section" class="form-control">
                                <option value="1" <?php echo e($edit->section == 1 ? 'selected' : ''); ?>>ইসলামিয়াত</option>
                                <option value="2" <?php echo e($edit->section == 2 ? 'selected' : ''); ?>>দুয়া</option>
                                <option value="3" <?php echo e($edit->section == 3 ? 'selected' : ''); ?>>এরাবিক</option>
                                <option value="4" <?php echo e($edit->section == 4 ? 'selected' : ''); ?>>অন্যন্য</option>
                            </select>
                        <label for="pdf_file"><strong><?php echo e(__('PDF File')); ?></strong></label>
                        <input id="pdf_file" name="pdf_file" type="file" class="form-control <?php $__errorArgs = ['pdf_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="application/pdf" autofocus>
                        <p><?php echo e($edit->pdf_file); ?></p>
                        <?php $__errorArgs = ['pdf'];
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

                       <label for="is_active"><strong><?php echo e(__('Status')); ?><strong></label>
                        <select id="type" name="is_active" class="form-control">
                            <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div><br>
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

<script src="<?php echo e(asset('public/js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/tinymce/init-tinymce.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/ebook/edit.blade.php ENDPATH**/ ?>
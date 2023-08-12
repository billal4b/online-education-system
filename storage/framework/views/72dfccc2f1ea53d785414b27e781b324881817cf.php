
<?php $__env->startSection('css'); ?>
<style>
#course_id {
    margin-left: 20px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="dashboard-form">
        <div class="row">
            <form  action="<?php echo e(route('admin.pdf.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update pdf file <a href="<?php echo e(route('admin.pdf')); ?>" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="title"><strong><?php echo e(__('Title')); ?></strong></label>
                            <input id="title" name="title" type="text" value="<?php echo e($edit->title); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="title" autofocus>
                                <?php $__errorArgs = ['title'];
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
                                <label><strong>Select Course :</strong></label>
                                <?php
                                    $id= $edit->course_id;
                                ?>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="course_id" id="course_id" <?php if($k == $id ): ?> checked <?php endif; ?> value="<?php echo e($k); ?>" onclick="onlyOne(this)"> <?php echo e($v); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            </div> <br>
                            <label for="content"><strong><?php echo e(__('Content')); ?></strong></label>
                            <textarea id="content" name="content" class="form-control tinymce <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required> <?php echo e($edit->content); ?></textarea><br>
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
                            <label for="pdf_file"><strong><?php echo e(__('Lecture Sheet ( pdf format)')); ?></strong></label>
                                <input id="pdf_file" name="pdf_file" type="file" class="form-control <?php $__errorArgs = ['pdf_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="application/pdf" autofocus>

                                <?php $__errorArgs = ['pdf_file'];
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
                                <p><a href="/public/pdf/<?php echo e($edit->pdf_file); ?>" target="_blank"><?php echo e($edit->pdf_file); ?></a></p>


                            <label for="is_active"><strong><?php echo e(__('Status')); ?></strong></label>
                            <select id="type" name="is_active" class="form-control">
                                <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Active</option>
                                <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Inactive</option>
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
   // document.getElementById('course_title').value = '<?php echo e($edit->course_title); ?>';

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_id')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>

<script src="<?php echo e(asset('public/js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/tinymce/init-tinymce.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/pdf/edit.blade.php ENDPATH**/ ?>
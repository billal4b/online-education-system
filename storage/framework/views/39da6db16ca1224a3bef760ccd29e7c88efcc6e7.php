
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/css/jquery.datetimepicker.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="dashboard-form">
        <div class="row">
            <form action="<?php echo e(route('admin.secondebook.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- Profile -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Add eBook <a href="<?php echo e(route('admin.ebook')); ?>"><span
                                    class="button gray">List</span></a></h4>
                        <div class="dashboard-list-box-static">

                            <!-- Details -->
                            <div class="my-profile">
                                <label for="published">
                                    <input type="checkbox" name="published" id="published">
                                    Publish?
                                </label>
                                <label for="publish_time" class="publish_date"><strong>Date</strong></label>
                                <input id="publish_time" name="publish_time" type="text"
                                       class="form-control datetimepicker publish_date">


                                <label for="course_id"><strong><?php echo e(__('Course Name')); ?></strong></label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                    <option value="">Select Course</option>
                                    <?php $__currentLoopData = COURSE_NAME; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseKey=>$courseName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($courseKey); ?>"><?php echo e($courseName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['course_id'];
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


                                <label for="subject_type"><strong><?php echo e(__('Subject Type')); ?></strong></label>
                                <select name="subject_type" id="subject_type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <?php $__currentLoopData = SUBJECT_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stypeKey=>$stypeName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($stypeKey); ?>"><?php echo e($stypeName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['subject_type'];
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


                                <label for="topic"><strong><?php echo e(__('Topic')); ?></strong></label>
                                <input id="topic" name="topic" type="text"
                                       class="form-control <?php $__errorArgs = ['topic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autofocus>
                                <?php $__errorArgs = ['topic'];
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

                                <div class="row">
                                    <div class="col-md-12">Content Type</div>
                                    <div class="col-md-2">
                                        <label for="content_type_both">
                                            <input type="radio" name="content_type" id="content_type_both"
                                                   value="<?php echo e(EBOOK_BOTH); ?>" checked="checked">
                                            Both
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="content_type_content">
                                            <input type="radio" name="content_type" id="content_type_content"
                                                   value="<?php echo e(EBOOK_CONTENT); ?>">
                                            Editor
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="content_type_document">
                                            <input type="radio" name="content_type" id="content_type_document"
                                                   value="<?php echo e(EBOOK_DOCUMENT); ?>">
                                            Document
                                        </label>
                                    </div>

                                </div>

                                <label for="content" class="content_area"><strong><?php echo e(__('Content')); ?></strong></label>
                                <textarea id="content" name="content"
                                          class="content_area form-control tinymce <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          required> </textarea><br>
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

                                <label for="document" class="document_area"><strong><?php echo e(__('PDF File')); ?></strong></label>
                                <input id="document" name="document" type="file"
                                    class="document_area form-control <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="application/pdf" autofocus>
                                <?php $__errorArgs = ['document'];
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
                            <button type="submit" class="button"><?php echo e(__('Save')); ?></button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('public/js/jquery.datetimepicker.full.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/tinymce/init-tinymce.js')); ?>"></script>
    <script>
        jQuery(document).ready(function () {
            'use strict';
            jQuery('#publish_time').datetimepicker();
            $('.publish_date').hide();
            $('#published').change(function () {
                if ($(this).is(':checked')) {
                    $('.publish_date').show();
                } else {
                    $('.publish_date').hide();
                }
            })
            $('#content_type_both').change(function () {
                if ($(this).is(':checked')) {
                    $('.content_area,.document_area,#mceu_22').show();
                } else {
                    $('.content_area,.document_area,#mceu_22').hide();
                }
            })
            $('#content_type_content').change(function () {
                if ($(this).is(':checked')) {
                    $('#mceu_22').show();
                    $('.document_area').hide();
                } else {
                    $('.content_area').hide();
                }
            })
            $('#content_type_document').change(function () {
                if ($(this).is(':checked')) {
                    $('.document_area').show();
                    $('.content_area,#mceu_22').hide();
                } else {
                    $('.document_area').hide();
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/secondebook/create.blade.php ENDPATH**/ ?>
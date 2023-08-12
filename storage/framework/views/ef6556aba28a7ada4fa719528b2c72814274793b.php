
<?php $__env->startSection('css'); ?>
<style>
.audio-file, .video-file, .pdf-file {
    display:none;
}
#course_id {
    margin-left: 20px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="dashboard-form">
    <div class="row">
        <form  action="<?php echo e(route('admin.media.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Media <a href="<?php echo e(route('admin.media')); ?>"><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">

                        <!-- Details -->
                        <div class="my-profile">

                            <label for="title"><strong><?php echo e(__('Title')); ?></strong></label>
                            <input id="title" name="title" type="text" class="form-control <?php $__errorArgs = ['title'];
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
                          <br>

                            <label for="file_type"><strong><?php echo e(__('File Format')); ?></strong></label>
                            <select id="file_type" name="file_type" class="form-control" required>
                                <option>-- Select Format--</option>
                                <option value="audio">Audio File</option>
                                <option value="video">Video File</option>
                            </select>

                            <div id="audio-file" style="display: none">
                                <label for="audio"><strong><?php echo e(__('Audio URL')); ?></strong></label>
                                <input id="audio" name="audio" type="text" class="form-control <?php $__errorArgs = ['audio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="audio" autofocus>
                                <?php $__errorArgs = ['audio'];
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
                            <div id="video-file" style="display: none">
                                <label for="video"><strong><?php echo e(__('YouTube Video Embed URL')); ?></strong></label>
                                <input id="video" name="video" type="text" class="form-control <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="https://" autocomplete="video" autofocus>

                                <?php $__errorArgs = ['video'];
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
                            <br>
                            <div class="form-group">
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

                                <label><strong>Select Courses :</strong></label>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label><input type="checkbox" name="course_id" id="course_id" value="<?php echo e($k); ?>" onclick="onlyOne(this)"> <?php echo e($v); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                            <label for="order"><strong><?php echo e(__('Order')); ?></strong></label>
                            <input id="order" name="order" type="number" class="form-control <?php $__errorArgs = ['order'];
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

                        </div><br>
                        <button type="submit" class="button"><?php echo e(__('Save')); ?></button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">

 $('#file_type').change(function(){

        if( $(this).val() == 'audio'){
            $('#audio-file').show();
        }else{
            $('#audio-file').hide();
        }

        if( $(this).val() == 'video'){
            $('#video-file').show();
        }else{
            $('#video-file').hide();
        }

    });

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_id')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/media/create.blade.php ENDPATH**/ ?>
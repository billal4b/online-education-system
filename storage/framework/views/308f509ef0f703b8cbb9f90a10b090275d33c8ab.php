
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
        <form  action="<?php echo e(route('admin.media.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Update Media <a href="<?php echo e(route('admin.media')); ?>" ><span class="button gray">List</span></a></h4>
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


                        <label for="file_type"><strong><?php echo e(__('Select Media Format')); ?></strong></label>
                        <select id="file_type" name="file_type" class="form-control">
                            <option> ---- Select ---</option>
                            <option value="audio" <?php echo e($edit->file_type == 'audio' ? 'selected' : ''); ?>>Audio File</option>
                            <option value="video" <?php echo e($edit->file_type == 'video' ? 'selected' : ''); ?>>Video File</option>
                        </select>

                        <div id="audio-file" style="display: none">
                            <label for="audio"><strong><?php echo e(__('Audio URL')); ?></strong></label>
                            <input id="audio" name="audio" type="text" value="<?php echo e($edit->audio); ?>" class="form-control <?php $__errorArgs = ['audio'];
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
                            <input id="video" name="video" type="text" value="<?php echo e($edit->video); ?>" class="form-control <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="video" autofocus>

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

                        <div class="form-group">
                            <label><strong>Select Courses :</strong></label>
                            <select name="course_id" id="course_id" class="form-control">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>"><?php echo e($v); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <label for="order"><strong><?php echo e(__('Order')); ?></strong></label>
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

document.getElementById('course_id').value = '<?php echo e($edit->course_id); ?>';


$(function() {
    $('#file_type').change(function(){
        fileType();
    });

    fileType();

})

  function fileType(){

    var that = $("#file_type");

    if (that.val() == 'audio'){
            $('#audio-file').show();
        }else{
            $('#audio-file').hide();
        }

        if (that.val() == 'video'){
            $('#video-file').show();
        }else{
            $('#video-file').hide();
        }
  }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/media/edit.blade.php ENDPATH**/ ?>
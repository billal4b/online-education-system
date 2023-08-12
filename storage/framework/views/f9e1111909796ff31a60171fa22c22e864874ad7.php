<?php $__env->startSection('css'); ?>
<style></style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
    <div class="row">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form  action="<?php echo e(route('admin.notice.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Notice <a href="<?php echo e(url()->previous()); ?>"><span class="button gray">Back</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">                            

                            <label for="title"><?php echo e(__('Title')); ?></label>
                            <input id="title" name="title" value="<?php echo e($edit->title); ?>" type="text" class="form-control <?php $__errorArgs = ['title'];
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
                            <label for="content"><?php echo e(__('Notice Content')); ?></label>
                            <textarea id="content" name="content" class="form-control tinymce <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required> <?php echo e($edit->content); ?> </textarea><br>
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
                            <div class="row">    
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="file"><?php echo e(__('PDF File')); ?></label>
                                    <input id="file" name="file" type="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="file"><br>                                  
                                        <?php $__errorArgs = ['file'];
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
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="publish_at"><?php echo e(__('Publish Date')); ?></label>
                                    <input id="publish_at" name="publish_at" value="<?php echo e($edit->publish_at); ?>" type="date" class="form-control <?php $__errorArgs = ['publish_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="publish_at" autofocus>
                                        <?php $__errorArgs = ['publish_at'];
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
                            </div> <br>     
                                
                            <label for="is_active"><?php echo e(__('Publication Status')); ?></label>
                            <select id="type" name="is_active" class="form-control">    
                                <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Publish</option>
                                <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Unpublish</option>
                            </select> 

                        </div>
                        <button type="submit" class="button"><?php echo e(__('Update')); ?></button>
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
<script>
    $(function() {
        $("#image").change(function() {
            console.log('image changed');
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/notice/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('css'); ?>
<style>
    #imageSize img{
        max-width:100px;
    }
    input[type=file]{ padding:10px; background:#2d2d2d;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
    <div class="row">
                    
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <form  action="<?php echo e(route('admin.course.update', $edit->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>    
                <h4 class="gray">Update Course Name <a href="<?php echo e(route('admin.course')); ?>" ><span class="button gray">List</span></a></h4>
                <div class="dashboard-list-box-static">
                    
                    <!-- Details -->
                    <div class="my-profile">

                        <label for="course_name"><?php echo e(__('Name')); ?></label>
                        <input id="course_name" name="course_name" value="<?php echo e($edit->course_name); ?>" type="text" class="form-control <?php $__errorArgs = ['course_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="course_name" autofocus>
                            <?php $__errorArgs = ['course_name'];
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
                        
                        <label for="category"><?php echo e(__('Category')); ?></label>
                        <select id="category" name="category" class="form-control">    
                            <option value="1" <?php echo e($edit->category == 1 ? 'selected' : ''); ?>>Registered User</option>
                            <option value="0" <?php echo e($edit->category == 0 ? 'selected' : ''); ?>>Admitted User</option>
                        </select> 
                        
                        <label for="order"><?php echo e(__('Order')); ?></label>
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
                            
                        <div id="imageSize">    
                            <label for="image"><?php echo e(__('Image (NB:327x245)')); ?></label>
                            <input id="image" name="image" type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="image"><br>                                  
                                <?php $__errorArgs = ['image'];
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
                            <img src="/public/images/courses/thumb/<?php echo e($edit->image); ?>" id="blah" name="image">    
                        </div> 

                        <label for="is_active"><?php echo e(__('Status')); ?></label>
                        <select id="type" name="is_active" class="form-control">    
                            <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Inactive</option>
                        </select> 
                    </div>
                    <button type="submit" class="button"><?php echo e(__('Update')); ?></button>
                </div> 
            </form>
                
            </div>
        </div>
    </div>            
   
</div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

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
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/courses/edit.blade.php ENDPATH**/ ?>
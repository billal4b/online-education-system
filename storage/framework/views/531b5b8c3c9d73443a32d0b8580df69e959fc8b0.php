<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
        <div class="row">
            <form  action="<?php echo e(route('admin.course.details.update', $edit->id)); ?>" method="post">
                <?php echo csrf_field(); ?> 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Course Name <a href="<?php echo e(route('admin.course.details')); ?>" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="course_name"><?php echo e(__('Course Name')); ?></label>
                            <select name="section_disabled" id="course_name" class="form-control" disabled>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->course_name); ?>"><?php echo e($course->course_name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>   
                            <input name="course_name" value="<?php echo e($edit->course_name); ?>" type="hidden"> 
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

                            <label for="course_details"><?php echo e(__('Course Information English')); ?></label>
                            <textarea  id="course_details" name="course_details" class="form-control tinymce <?php $__errorArgs = ['course_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit->course_details); ?></textarea><br>
                                <?php $__errorArgs = ['course_details'];
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
                        
                            <label for="course_details_bd"><?php echo e(__('Course Information Bengla')); ?></label>
                            <textarea  id="course_details_bd" name="course_details_bd" class="form-control tinymce <?php $__errorArgs = ['course_details_bd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit->course_details_bd); ?></textarea><br>
                                <?php $__errorArgs = ['course_details_bd'];
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
 
                                
                            <label for="is_active"><?php echo e(__('Status')); ?></label>
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
<script src="<?php echo e(asset('public/js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/tinymce/init-tinymce.js')); ?>"></script>
<script>
    document.getElementById('course_name').value = '<?php echo e($edit->course_name); ?>';
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/course_details/edit.blade.php ENDPATH**/ ?>
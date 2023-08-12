
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
        <div class="row">
            <form  action="<?php echo e(route('admin.section.update', $edit->id)); ?>" method="post">
                <?php echo csrf_field(); ?> 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Section <a href="<?php echo e(route('admin.section')); ?>" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="section_name"><?php echo e(__('Section Name')); ?></label>
                            <input id="section_name" name="section_name" value="<?php echo e($edit->section_name); ?>" type="text" class="form-control <?php $__errorArgs = ['section_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="section_name" autofocus>
                                <?php $__errorArgs = ['section_name'];
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
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/sections/edit.blade.php ENDPATH**/ ?>
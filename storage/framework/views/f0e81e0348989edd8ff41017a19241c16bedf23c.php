
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
    <div class="row">
        <form  action="<?php echo e(route('admin.content.update', $edit->id)); ?>" method="post">
                <?php echo csrf_field(); ?> 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Content <a href="<?php echo e(route('admin.content')); ?>" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="section_name"><?php echo e(__('Section Name')); ?></label>
                            <select name="section_name" id="section_name" class="form-control">
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->section_name); ?>"><?php echo e($section->section_name); ?> </option>                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>     

                            <label for="title"><?php echo e(__('Post Title')); ?></label>
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

                            <label for="content"><?php echo e(__('Post Content')); ?></label>
                            <textarea  id="content" name="content" class="form-control tinymce <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit->content); ?></textarea><br>
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
                            <label for="order"><?php echo e(__('Order')); ?></label>
                            <input id="order" name="order" value="<?php echo e($edit->order); ?>" type="text" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="order">
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
        </form>
    </div>
</div>  
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('public/js/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/tinymce/init-tinymce.js')); ?>"></script>
    <script type="text/javascript">
        document.getElementById('section_name').value = '<?php echo e($edit->section_name); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/contents/edit.blade.php ENDPATH**/ ?>
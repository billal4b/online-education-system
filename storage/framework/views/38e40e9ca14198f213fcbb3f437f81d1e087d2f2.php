
<?php $__env->startSection('css'); ?>
    <style>
        
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>    
<div class="dashboard-form">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
   </div>
        <div class="row">      
            <div class="col-lg-2 col-md-12 col-xs-12"></div>    
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Your Profile<a href="<?php echo e(route('user.profile')); ?>" ><span class="button gray">Profile</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <form  action="<?php echo e(route('user.profile.update', $edit->id)); ?>" method="post" id="sectionForm">
                            <?php echo csrf_field(); ?>
                        <div class="my-profile">
                            <label for="name"><strong><?php echo e(__('Full Name')); ?></strong></label>
                            <input id="name" name="name" value="<?php echo e($edit->name); ?>" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
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
                            <label for="mobile"><strong><?php echo e(__('Mobile Number')); ?></strong></label>
                            <input id="mobile" name="mobile" value="<?php echo e($edit->mobile); ?>" type="text" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="mobile number" autofocus>
                                <?php $__errorArgs = ['mobile'];
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
                            <label for="email"><strong><?php echo e(__('E-Mail Address')); ?></strong></label>
                            <input id="email" name="email" value="<?php echo e($edit->email); ?>" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="email">
                                <?php $__errorArgs = ['email'];
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
                            <label for="address"><strong><?php echo e(__('Address')); ?></strong></label>
                            <input id="address" name="address" value="<?php echo e($edit->address); ?>" type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="address" autofocus>
                                <?php $__errorArgs = ['address'];
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
                            <label for="gender"><strong><?php echo e(__('Gender')); ?></strong></label>
                            <select name="gender" class="form-control">
                                <option value="male" <?php echo e($edit->gender == 'male' ? 'selected' : ''); ?>>Male</option>
                                <option value="female" <?php echo e($edit->gender == 'female' ? 'selected' : ''); ?>>Female</option>
                            </select>
                                <?php $__errorArgs = ['gender'];
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
                            <label for="blood_group"><strong><?php echo e(__('Blood Group')); ?></strong></label>
                            <select name="blood_group" class="form-control">
                                <option value="a+" <?php echo e($edit->blood_group == 'a+' ? 'selected' : ''); ?>>A + </option>
                                <option value="b+" <?php echo e($edit->blood_group == 'b+' ? 'selected' : ''); ?>>B + </option>
                                <option value="o+" <?php echo e($edit->blood_group == 'o+' ? 'selected' : ''); ?>>O + </option>
                                <option value="ab+" <?php echo e($edit->blood_group == 'ab+' ? 'selected' : ''); ?>>AB + </option>
                                <option value="a-" <?php echo e($edit->blood_group == 'a-' ? 'selected' : ''); ?>>A - </option>
                                <option value="b-" <?php echo e($edit->blood_group == 'b-' ? 'selected' : ''); ?>>B - </option>
                                <option value="o-" <?php echo e($edit->blood_group == 'o-' ? 'selected' : ''); ?>>O - </option>
                                <option value="ab-" <?php echo e($edit->blood_group == 'ab-' ? 'selected' : ''); ?>>AB - </option>
                            </select>
                                <?php $__errorArgs = ['blood_group'];
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
                            <label for="dob"><strong><?php echo e(__('Date of Birth')); ?></strong></label>
                            <input id="dob" name="dob" type="date" value="<?php echo e($edit->dob); ?>" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="address" autofocus>
                                <?php $__errorArgs = ['dob'];
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
                            <label for="nid_no"><strong><?php echo e(__('NID')); ?></strong></label>
                            <input id="nid_no" name="nid_no" value="<?php echo e($edit->nid_no); ?>" type="number" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="address" autofocus>
                                <?php $__errorArgs = ['nid_no'];
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
                            <button type="submit" class="button"><?php echo e(__('Update')); ?></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>   
            <div class="col-lg-2 col-md-6 col-xs-12"></div>           
        </div>
    </div>      
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('userend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/userend/users/user_edit.blade.php ENDPATH**/ ?>
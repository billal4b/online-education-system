
<?php $__env->startSection('css'); ?>
    <style>
        .my-profile span { float: right; }
        label { background-color: #e0e0e0; padding: 5px 15px;}       
        .btn-primary {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp { margin-bottom:15px; }
        input[type=file] { height: auto; padding: 0px; }  
        img { margin-bottom: 10px;}   
        label .sub-btn-color {margin-top: 2px; background-color: azure;}  
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
              
            <div class="col-lg-2 col-md-3 col-xs-12 imgUp" align="center">   
                
                <img src="<?php echo e(asset('public/images/profile')); ?>/<?php echo e(Auth::user()->image); ?>" id="blah" alt="<?php echo e(Auth::user()->name); ?>">
                <form  action="<?php echo e(route('admin.profile.picture', Auth::user()->id)); ?>" method="post" novalidate enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>                              
                    <input type="hidden" name="name" value="<?php echo e(Auth::user()->name); ?>">  
                    <label class="btn btn-primary">Upload Picture
                        <input type="file" id="image" name="image" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
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
                    <br>
                    <label for="image" style="margin-top: 5px; background-color: #333a65; color:#fff"><button type="submit"><?php echo e(__('Submit Here')); ?></button></label>
                </form>
            </div>  
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">My Profile<a href="<?php echo e(route('admin.edit', Auth::user()->id)); ?>" ><span class="button gray">Edit Profile</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label><strong><?php echo e(__('Name')); ?></strong> <span> <?php echo e(Auth::user()->name); ?></span></label>
                            <label><strong><?php echo e(__('Contact')); ?></strong> <span> <?php echo e(Auth::user()->mobile); ?></span></label>
                            <label><strong><?php echo e(__('E-Mail')); ?></strong> <span> <?php echo e(Auth::user()->email); ?></span></label>
                            <label><strong><?php echo e(__('Gender')); ?></strong> <span> <?php echo e(Auth::user()->gender); ?></span></label>
                            <label><strong><?php echo e(__('Blood Group')); ?></strong> <span> <?php echo e(Auth::user()->blood_group); ?></span></label>
                            <label><strong><?php echo e(__('NID')); ?></strong> <span> <?php echo e(Auth::user()->nid_no); ?></span></label>
                            <label><strong><?php echo e(__('Address')); ?></strong> <span> <?php echo e(Auth::user()->address); ?></span></label>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-lg-2 col-md-6 col-xs-12"></div>           
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

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/users/profile.blade.php ENDPATH**/ ?>
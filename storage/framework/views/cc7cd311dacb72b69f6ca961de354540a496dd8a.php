<?php $__env->startSection('css'); ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Image List <a href="<?php echo e(route('admin.image.create')); ?>" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Title</th>      
                        <th>Type</th> 
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo $image->title; ?></td>
                        <td><?php echo $image->image_type; ?></td>
                        <td><a href="/public/images/banner/<?php echo $image->image_thumb; ?>">
                                <img src="/public/images/banner/thumb/<?php echo $image->image_thumb; ?>">
                            </a>
                        </td>
                        <td><input type="checkbox" data-id="<?php echo e($image->id); ?>" name="is_active" class="js-switch" <?php echo e($image->is_active == 1 ? 'checked' : ''); ?> data-toggle="toggle"></td>
                        <td>                         
                            <a href="<?php echo e(route('admin.image.delete', $image->id)); ?>" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
                        </td>   
                    </tr>                     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">

 $(document).ready(function(){
    $('.js-switch').change(function () {
        let is_active = $(this).prop('checked') === true ? 1 : 0;
        let imageId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '<?php echo e(route('admin.image.change.status')); ?>',
            data: {'is_active': is_active, 'id': imageId},
            success: function (data) {
                console.log(data.success);
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/image/index.blade.php ENDPATH**/ ?>
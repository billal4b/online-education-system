<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Course List <a href="<?php echo e(route('admin.course.create')); ?>" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th> 
                        <th>Name</th>   
                        <th>Category</th>  
                        <th>Image</th>       
                        <th>Order</th>    
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($course->course_name); ?></td>
                        <td><?php echo $course->category == 1 ? 'Adult' : 'kids'; ?></td>
                        <td><img src="/public/images/courses/thumb/<?php echo $course->thumb; ?>"> </td>
                         <td><?php echo e($course->order); ?></td>
                        <td><span class="<?php echo e($course->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $course->is_active == 1 ? 'Active' : 'Inactive'; ?></span></td>
                        <td>
                            <a href="<?php echo e(route('admin.course.edit', $course->id)); ?>" class="button gray"><i class="sl sl-icon-pencil"></i></a>
                            <a href="<?php echo e(route('admin.course.delete', $course->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/courses/index.blade.php ENDPATH**/ ?>
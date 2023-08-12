
<?php $__env->startSection('css'); ?>
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
   
    <div class="col-lg-12 col-md-12 col-xs-12">
         <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Admitted User List</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>address</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admittedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admittedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($admittedUser->student_name); ?></td>
                        <td>
                            <?php if(!empty($admittedUser->select_course)): ?>
                                <?php $__currentLoopData = $admittedUser->select_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($courses[$v])): ?>
                                   <li> <?php echo e($courses[$v]); ?> </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($admittedUser->email); ?></td>
                        <td><?php echo e($admittedUser->contact); ?></td>
                        <td><a href="/public/images/admission/<?php echo e($admittedUser->student_image); ?>" target="_blank">
                                <img src="/public/images/admission/thumb/<?php echo e($admittedUser->student_image); ?>" width="50" height="50">
                            </a>
                        </td>
                        <td><?php echo e($admittedUser->date_time); ?></td>
                        <td><?php echo e($admittedUser->address); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.admitted.show', $admittedUser->id)); ?>" class="button">View</a>
                            <a onclick="return confirm('Are you sure to Delete?')" href="<?php echo e(route('admin.admitted.delete', $admittedUser->id)); ?>" class="button">Delete</a>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php echo $admittedUsers->links(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/users/admitted_user.blade.php ENDPATH**/ ?>
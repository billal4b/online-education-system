<?php $__env->startSection('css'); ?>
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
   </style> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">All User</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>   
                        <th>Mobile</th>    
                        <th>Email</th>                                            
                        <th>Course</th>
                        <th>Address</th>  
                        <th>NID</th>     
                        <th>DOB</th>   
                        <th>Role</th>                                                     
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('admin.edit', $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                        <td><?php echo e($user->mobile); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->course_title); ?></td>
                        <td><?php echo e($user->address); ?></td>
                        <td><?php echo e($user->nid_no); ?></td>                                                      
                        <td><?php echo e($user->updated_at->todatestring()); ?></td>
                        <td><?php echo e($user->is_admin == 1 ? 'Admin' : 'User'); ?></td> 
                        <td><span class="<?php echo e($user->status == 'active' ? 'paid' : 'cancel'); ?> t-box"><?php echo $user->status == 'inactive' ? 'Pending' : 'Approved'; ?></span></td>
                        <td>
                            <a href="<?php echo e(route('admin.user.delete', $user->id)); ?>" onclick="return confirm('Are you sure to Delete?')" class="button">Delete</a>
                        </td>
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                </tbody>
            </table>               
            </div>
        </div>
            <?php echo $users->links(); ?>       
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/backend/users/index.blade.php ENDPATH**/ ?>
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
            <h4 class="gray">Fund Pledge Donor List</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Amount</th>
                        <th>Pledge Clause</th>
                        <th>Pledge Time</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $FundPledge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('admin.pledge.edit', $donor->id)); ?>"><i class="sl sl-icon-pencil"></i> <?php echo e($donor->name); ?></a></td>
                        <td><?php echo e($donor->address); ?></td>
                        <td><?php echo e($donor->contact); ?></td>
                        <td><?php echo e($donor->fund_amount); ?></td>
                        <td><?php echo e($donor->pledge_clause); ?></td>
                        <td><?php echo e($donor->pledge_time); ?></td>
                        <td><?php echo e($donor->issue_date); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.pledge.show', $donor->id)); ?>" class="button">View</a>
                            <a onclick="return confirm('Are you sure to Delete?')" href="<?php echo e(route('admin.pledge.delete', $donor->id)); ?>" class="button">Delete</a>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php echo $FundPledge->links(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/pledge/index.blade.php ENDPATH**/ ?>
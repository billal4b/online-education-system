

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">All Message</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $contactUs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($contact->created_at->format('d-m-Y')); ?></td>
                        <td><?php echo e($contact->name); ?></td>
                        <td><?php echo e($contact->message); ?></td>
                        <td><?php echo e($contact->mobile_no); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.contact.delete', $contact->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/contact_us/index.blade.php ENDPATH**/ ?>
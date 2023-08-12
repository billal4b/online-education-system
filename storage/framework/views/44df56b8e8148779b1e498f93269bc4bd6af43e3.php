<?php $__env->startSection('main-content'); ?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
      <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="dashboard-list-box">
          <h4 class="gray">Audio List
            <a href="<?php echo e(route('admin.audio.create')); ?>">
            <span class="button gray">Add</span></a>
          </h4>
          <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo $audio->title; ?></td>
                          <td><?php echo $audio->course_title; ?></td>
                          <td><?php echo $audio->order; ?></td>
                          <td><span class="<?php echo e($audio->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $audio->is_active == 1 ? 'Active' : 'Inactive'; ?></span></td>

                          <td>
                            <a href="<?php echo e(route('admin.audio.edit', $audio->id)); ?>" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                            <a href="<?php echo e(route('admin.audio.delete', $audio->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
          </div>
      </div>
      <?php echo $data->links(); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/audio/index.blade.php ENDPATH**/ ?>
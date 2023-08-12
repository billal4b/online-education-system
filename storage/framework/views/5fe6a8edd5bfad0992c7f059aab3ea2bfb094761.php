<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
       <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Result List
              <a href="<?php echo e(route('admin.result.create')); ?>">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Class/Course Name</th>
                        <th>Exam Name</th>
                        <th>Subject Name</th>
                        <th>PDF File</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo $result->course_title; ?></td>
                          <td><?php echo $result->exam_name; ?></td>
                          <td><?php echo $result->subject_name; ?></td>
                          <td>
                            <a href="/public/result/<?php echo $result->pdf_file; ?>" target="_blank">
                                <img src="/public/pdf/pdf.png" width="50px" height="50px">
                            </a>
                          </td> 
                          <td>
                            <a href="<?php echo e(route('admin.result.edit', $result->id)); ?>" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>

                            <a href="<?php echo e(route('admin.result.delete', $result->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/result/index.blade.php ENDPATH**/ ?>
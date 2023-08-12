

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="<?php echo e(route('admin.ebook')); ?>" ><span class="button gray">List</span></a> </h4>
            <div class="table-box">
                <table class="basic-table booking-table">

                    <tbody>
                        <tr>
                            <td><b>Published Date</b></td>
                            <td><?php echo $show->publish_time; ?></td>
                        </tr>
                        <tr>
                            <td><b>Course Name</b></td>
                            <td><?php echo @COURSE_NAME[$show->course_id]; ?></td>
                        </tr>
                        <tr>
                            <td><b>Subject Type</b></td>
                            <td><?php echo @SUBJECT_TYPE[$show->subject_type]; ?></td>
                        </tr>
                        <tr>
                            <td><b>Topic</b></td>
                            <td><?php echo $show->topic; ?></td>
                        </tr>
                        <tr>
                            <td><b>Content</b></td>
                            <td><?php echo $show->content; ?></td>
                        </tr>
                        <tr>
                            <td><b>Document File</b></td>
                            <?php if($show->document !=null): ?>
                                <td><a href="/public/ebook/<?php echo e($show->document); ?>" target="_blank"><?php echo e($show->document); ?></a></td>
                            <?php else: ?>
                                <td>No Document</td>
                            <?php endif; ?>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/secondebook/show.blade.php ENDPATH**/ ?>
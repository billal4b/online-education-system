

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Details<a href="<?php echo e(route('admin.admitted.user')); ?>" ><span class="button gray">List</span></a> </h4>
            <div class="table-box">
                <table class="basic-table booking-table">

                    <tbody>

                        <tr>
                            <td><b>Student Name</b></td>
                            <td><?php echo $show->student_name; ?></td>
                        </tr>
                        <tr>
                            <td><b>EQ</b></td>
                            <td><?php echo $show->edu_qua; ?></td>
                        </tr>
                        <tr>
                            <td><b>Institute Name</b></td>
                            <td><?php echo $show->institute_name; ?></td>
                        </tr>
                        <tr>
                            <td><b>DOB</b></td>
                            <td><?php echo $show->dob; ?></td>
                        </tr>
                        <tr>
                            <td><b>Gender</b></td>
                            <td><?php echo $show->gender; ?></td>
                        </tr>
                        <tr>
                            <td><b>Course</b></td>
                            <td>
                                <?php if(!empty($show->select_course)): ?>
                                <?php $__currentLoopData = $show->select_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($courses[$v])): ?>
                                   <li> <?php echo e($courses[$v]); ?> </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </td>
                        </tr>
                        <tr>
                            <td><b>Guardian</b></td>
                            <td><?php echo $show->guardian_name; ?></td>
                        </tr>

                        <tr>
                            <td><b>Relation</b></td>
                            <td><?php echo $show->relation; ?></td>
                        </tr>
                        <tr>
                            <td><b>E-mail</b></td>
                            <td><?php echo $show->email; ?></td>
                        </tr>
                        <tr>
                            <td><b>Contact</b></td>
                            <td><?php echo $show->contact; ?></td>
                        </tr>
                        <tr>
                            <td><b>Father Contact</b></td>
                            <td><?php echo $show->father_contact; ?></td>
                        </tr>
                        <tr>
                            <td><b>Mother Contact</b></td>
                            <td><?php echo $show->mother_contact; ?></td>
                        </tr>
                        <tr>
                            <td><b>address</b></td>
                            <td><?php echo $show->address; ?></td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td><?php echo $show->date_time; ?></td>
                        </tr>



            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/users/admitted_user_show.blade.php ENDPATH**/ ?>
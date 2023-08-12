
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <form action="<?php echo e(route('admin.ebook')); ?>" method="get" autocomplete="off">
            <div class="col-md-2" style="padding-right: 0">
                <input type="hidden" name="topic_text" id="topic_text" value="<?php echo e(@$topicText); ?>">
                <select name="course_name" id="course_name">
                    <option value="" selected>Select Course</option>
                    <?php $__currentLoopData = COURSE_NAME; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(@$courseId == $k): ?>
                            <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2" style="padding-left:0;padding-right: 0">
                <select name="subject_type" id="subject_type">
                    <option value="" selected>Select Subject</option>
                    <?php $__currentLoopData = SUBJECT_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(@$subjectId == $k): ?>
                            <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3" style="padding-left:0;padding-right: 0">
                <select name="topic" id="topicSelection">
                    <?php if(@$topicKey != null): ?>
                        <option value="<?php echo e(@$topicKey); ?>" class="form-control" selected><?php echo e(@$topicText); ?></option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-3" style="padding-left:0;padding-right: 0">
                <input type="text" class="form-control" name="daterange" id="dateRange" value="<?php echo e(@$dateRange); ?>"
                       placeholder="Select Date Range">
            </div>
            <div class="col-md-1" style="padding-left:0;padding-right: 0">
                <input value="Search" type="submit" style="height: 42px;padding: 6px;">
            </div>
        </form>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="dashboard-list-box">
                <h4 class="gray">eBook List
                    <a href="<?php echo e(route('admin.secondebook.create')); ?>">
                        <span class="button gray">Add</span></a>
                </h4>
                <div class="table-box">
                    <table class="basic-table booking-table">
                        <thead>
                        <tr>
                            <th>Course</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(route('admin.secondebook.edit', $ebook->id)); ?>"><i class="sl sl-icon-pencil"></i> <?php echo @COURSE_NAME[$ebook->course_id]; ?></a></td>
                                <td><?php echo @SUBJECT_TYPE[$ebook->subject_type]; ?></td>
                                <td><?php echo $ebook->topic; ?></td>
                                
                                <td><?php echo e(date('d-M-Y h:i A', strtotime($ebook->publish_time))); ?></td>
                                <td>
                                    <span class="<?php echo e($ebook->published == 2 ? 'paid' : 'cancel'); ?> t-box"><?php echo $ebook->published == 2 ? 'Published' : 'Unpublished'; ?></span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.secondebook.show', $ebook->id)); ?>" class="button gray"
                                       data-toggle="tooltip" data-placement="top" title="Show"><i
                                                class="sl sl-icon-eye"></i></a>

                                    <a href="<?php echo e(route('admin.secondebook.delete', $ebook->id)); ?>" class="button gray"
                                       onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"
                                                                                              data-toggle="tooltip"
                                                                                              data-placement="top"
                                                                                              title="Delete"></i></a>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            function clearDefaultDateRange() {
                setTimeout(function () {
                    $('#dateRange').val('')
                }, 100)
            }

            <?php if(empty($dateRange)): ?>
            clearDefaultDateRange()
            <?php endif; ?>
            $('#topicSelection').select2({
                theme: "bootstrap",
                placeholder: "Search by Topic",
                ajax: {
                    url: '<?php echo e(route('ebook.topic.search')); ?>',
                    dataType: 'json'
                },
                width: '100%',
                allowClear: true,
                minimumInputLength: 2
            });
            $('#topicSelection').change(function () {
                $('#topic_text').val($('#topicSelection option:selected').text())
            })
            $('#dateRange').daterangepicker({
                //autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD-MM-YYYY',
                    separator: ' to '
                },
                maxSpan: {
                    "days": 30
                },
            });
            $(document).on('click', '.cancelBtn', function (ev, picker) {
                $('#dateRange').val('');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/secondebook/index.blade.php ENDPATH**/ ?>
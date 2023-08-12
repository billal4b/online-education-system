
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
        span strong {
            color: #3c763d;
        }
   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <form action="<?php echo e(route('admin.user')); ?>" method="get" autocomplete="off">
        <div class="col-md-2" style="padding-right: 0">
            <select name="gender" id="gender">
                <option value="" selected>Select Gender</option>

                <?php $__currentLoopData = GENDER_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(@$genderId == $v): ?>
                        <option value="<?php echo e($v); ?>" selected><?php echo e($v); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($v); ?>"><?php echo e($v); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="col-md-3" style="padding-left:0;padding-right: 0">
            <input type="hidden" name="name_text" id="name_text" value="<?php echo e(@$nameText); ?>">
            <select name="select_course" id="select_course">
                <option value="" selected>Select Course</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(@$courseId == $k): ?>
                        <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3" style="padding-left:0;padding-right:0;">
            <select name="name" id="nameSelection">
                <?php if(@$nameKey != null): ?>
                    <option value="<?php echo e(@$nameKey); ?>" class="form-control" selected><?php echo e(@$nameText); ?></option>
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
            <h4 class="gray">Registered User List</h4>

            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>S.ID</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Category</th>
                        <th>Online</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('admin.edit', $user->id)); ?>"><i class="sl sl-icon-pencil"></i> <?php echo e($user->name); ?></a></td>
                        <td><?php echo e($user->user_id); ?></td>
                        <td><?php echo e($user->mobile); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php if(!empty($user->select_course)): ?>
                                <?php $__currentLoopData = $user->select_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($courses[$v])): ?>
                                   <li> <?php echo e($courses[$v]); ?> </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $user->is_kids == 1 ? 'Kides' : 'Adult'; ?></td>
                        <td>
                            <?php if($user->isOnline()): ?>
                                <span class="paid t-box">Online</span>
                            <?php else: ?>
                                <span class="Pending t-box">Offline</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->gender); ?></td>
                        <td><?php echo e($user->updated_at->format('d-m-Y')); ?></td>
                        <td><span class="<?php echo e($user->status == 'active' ? 'paid' : 'cancel'); ?> t-box">
                            <?php echo $user->status == 'inactive' ? 'Pending' : 'Approved'; ?></span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.user.delete', $user->id)); ?>" onclick="return confirm('Are you sure to Delete?')" class="button">Delete</a>
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
        $('#nameSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Name",
            ajax: {
                url: '<?php echo e(route('admin.user.name.search')); ?>',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
        $('#nameSelection').change(function () {
            $('#name_text').val($('#nameSelection option:selected').text())
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

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/users/index.blade.php ENDPATH**/ ?>
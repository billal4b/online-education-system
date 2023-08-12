
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .select2-container--bootstrap .select2-selection--single { height: 41px; }
        tbody td a { color: #337ab7; text-decoration: underline; }
        tbody td span { color: brown; font-weight: bold}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <form action="<?php echo e(route('admin.payment')); ?>" method="get" autocomplete="off">        
        <div class="col-md-3" style="padding-left:20px;padding-right: 0">            
            <select name="course_title" id="course_title">
                <option value="" selected>--- Select Course ---</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(@$courseId == $k): ?>
                        <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3" style="padding-left:20px;padding-right:0;">
            <input type="hidden" name="name_text" id="name_text" value="<?php echo e(@$nameText); ?>">
            <select name="student_id" id="nameSelection">
                <?php if(@$nameKey != null): ?>
                    <option value="<?php echo e(@$nameKey); ?>" class="form-control" selected><?php echo e(@$nameText); ?></option>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-3" style="padding-left:20px;padding-right: 0">
            <input type="text" class="form-control" name="daterange" id="dateRange" value="<?php echo e(@$dateRange); ?>"
                   placeholder="Select Date Range">
        </div>
        <div class="col-md-1" style="padding-left:20px;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px; padding: 5px 15px; ">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">            
            <h4 class="gray">List of Payment <a href="<?php echo e(route('admin.payment.create')); ?>" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>S.Name</th>
                        <th>S.ID</th>
                        <th>Date</th>                          
                        <th>Amount</th>  
                        <th>Tran. id</th>  
                        <th>Contact</th>  
                        <th>Course</th>                                               
                        <th>Method</th>                                               
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                  
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                    <tr>           
                        <td><a href="<?php echo e(route('admin.payment.edit', $payment->id)); ?>"><i class="sl sl-icon-pencil"></i> <?php echo e($payment->user->name); ?></a></td>             
                        <td><?php echo e($payment->user_id); ?></td>               
                        <td><?php echo date('d-m-Y', strtotime($payment->date_time)); ?></td>                                                      
                        <td><span><?php echo e($payment->payment_amount); ?></span></td>
                        <td><?php echo e($payment->transaction_id); ?></td>
                        <td><?php echo e($payment->contact); ?></td>
                        <td>
                            <?php if(!empty($payment->course_title)): ?>
                                <?php $__currentLoopData = $payment->course_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($courses[$v])): ?>
                                        <li> <?php echo e($courses[$v]); ?> </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>                      
                        <td><?php echo $payment->payment_method; ?></td>   
                        <td>
                            <a href="<?php echo e(route('admin.payment.delete', $payment->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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
            placeholder: "Search by Student ID",
            ajax: {
                url: '<?php echo e(route('admin.payment.search')); ?>',
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

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/payment/index.blade.php ENDPATH**/ ?>
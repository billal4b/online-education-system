
<?php $__env->startSection('css'); ?>
    <style>
        tbody td a { color: #337ab7; text-decoration: underline; }
        tbody td span { color: brown; font-weight: bold}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
   
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">            
            <h4 class="gray">Your Payment</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Date</th>                          
                        <th>Amount</th>  
                        <th>Tran. id</th>  
                        <th>Course</th>                                               
                        <th>Payment Method</th>                                               
                    </tr>
                </thead>
                <tbody>                  
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                    <tr>           
                        <td><?php echo e($payment->user->name); ?></td>             
                        <td><?php echo e($payment->user_id); ?></td>               
                        <td><?php echo date('d-m-Y', strtotime($payment->date_time)); ?></td>                                                      
                        <td><span><?php echo e($payment->payment_amount); ?></span></td>
                        <td><?php echo e($payment->transaction_id); ?></td>
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
                         
                    </tr>                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </tbody>
            </table>
            </div>
        </div>
      
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/userend/users/user_payment.blade.php ENDPATH**/ ?>
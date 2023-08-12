
<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .payment {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
        }
        .inner-heading .payment:before {
            background: none;
        }
        #course_title {
            margin-left: 20px;
        }
        .required { color: red;}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Payment Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>
           
    <!--Education Event-->
    <section class="edu-events event_third section-inner">
        <div class="container">
            <!-- section title -->
            <div class="inner-heading">
                <h2>Choose your payment method</h2>
            </div>
            <div class="row">
                <div class="col-xs-12">                 

                   <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 1 : City Bank (1502 715112 001)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>Account number : 15027 15112 001 </li><br>
                                    <li><i class="fa fa-adjust"></i>Account Name : IQS Consultancy</li><br>
                                    <li><i class="fa fa-adjust"></i>Routing number: 225274361</li><br>
                                    <li><i class="fa fa-map-marker"></i>Mouchak Branch, Dhaka</li>
                                    </ul>
                                <p>City Bank এর মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন।</p>
                            </div>
                               
                            <div class="cvvs_img">
                                <img src="public/images/city_bank.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                    <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 2 : bKask (01711 234831)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>bKash number (Personal) : 01711 234831</li><br>
                                    <li><i class="fa fa-phone"></i>Call iqsbd : +88 01711 234 831</li>  
                                </ul>
                                <p>বিকাশের মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন। </p>
                            </div>

                            <div class="cvvs_img">
                                <img src="public/images/bkash.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                    <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 3 : Nagad (01711 234831)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>Nagad number (Personal) : 01711 234831</li><br>
                                    <li><i class="fa fa-phone"></i>Call iqsbd : +88 01711 234 831</li>  
                                </ul>
                                <p>নগদের মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন। </p>
                            </div>

                            <div class="cvvs_img">
                                <img src="public/images/nagad.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                </div>  
              
            </div>

            <div class="row">
                 <!-- section title -->
                 <div class="inner-heading">
                    <h2 class="payment"><b>Payment Confirmation Form</b></h2>
                </div>
                 <!--flash Message-->
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form method="POST" action="<?php echo e(route('paymentinfo.form')); ?>" id="sectionForm">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6 col-xs-12">                           
                        
                        <div class="form-group">
                            <label for="student_id"><strong><?php echo e(__('Student ID')); ?>  <span class="required">*</span></strong></label>
                            <input id="student_id" type="text" class="form-control <?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="student_id" value="<?php echo e(old('student_id')); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="payment_method"><strong><?php echo e(__('Payment Method')); ?>  <span class="required">*</span></strong></label>
                            <select id="payment_method" name="payment_method">
                                <option value="bkask">bKask ( 01711 234831 )</option>
                                <option value="nagad">Nagad ( 01711 234831 )</option>
                                <option value="ab-bank">City Bank ( 1502 715112 001 )</option>                                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_amount"><strong><?php echo e(__('Payment Amount')); ?>  <span class="required">*</span></strong></label>
                            <input id="payment_amount" type="number" class="form-control <?php $__errorArgs = ['payment_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="payment_amount" required>
                            <?php $__errorArgs = ['payment_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div> 
                        <div class="form-group">
                            <label for="transaction_id"><strong><?php echo e(__('Transaction ID/Order ID')); ?> <span class="required">*</span></strong></label>
                            <input id="transaction_id" type="text" class="form-control <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="transaction_id" value="<?php echo e(old('transaction_id')); ?>" required autofocus>
                            <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>       
                        <div class="form-group">
                            <label for="date_time"><strong><?php echo e(__('Payment Month')); ?> <span class="required">*</span></strong></label>
                            <input id="date_time" type="date" class="form-control <?php $__errorArgs = ['date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_time" value="<?php echo e(old('date_time')); ?>" required autofocus>
                            <?php $__errorArgs = ['date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>              
                    </div>
                    <div class="col-md-6 col-xs-12">
                        

                        <div class="form-group">
                            <label><strong><?php echo e(__('Your Course')); ?> <span class="required">*</span></strong></label><br>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input type="checkbox" name="course_title[]" id="course_title" value="<?php echo e($k); ?>"> <?php echo e($v); ?></label><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__errorArgs = ['course_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="contact"><strong><?php echo e(__('Contact No (Ex: 01717xxxxxx)')); ?></strong></label>
                             <input id="contact" type="text" class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact" value="<?php echo e(old('contact')); ?>" autofocus>
                             <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                            <button type="submit" class="mt_btn_yellow"> <?php echo e(__('Submit')); ?> </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Education Event-->   
    

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
   (function() {
    const form = document.querySelector('#sectionForm');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }

            checkValidity();
        }
    }

    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }

        return false;
    }

    function checkValidity() {
        const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }

    init();
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/payment.blade.php ENDPATH**/ ?>
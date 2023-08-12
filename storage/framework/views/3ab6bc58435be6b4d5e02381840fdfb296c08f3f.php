<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .payment {
            text-align: center;
        }
        .inner-heading .payment:before {
            background: none;
        }
        #course_title {
            margin-left: 20px;
        }
        .required { color: red;}
        .middel-text {
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .donor-section-one, .donor-section-two, .donor-section-three {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 15px;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
IQS SOCIAL DEVELOPMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>
    <!--Education Event-->
    <section class="edu-events event_third section-inner">
        <div class="container">
            <div class="row">
                 <!-- section title -->
                 <div class="inner-heading">
                    <h2 class="payment"><b>SOCIAL DEVELOPMENT FUND PLEDGE FORM</b></h2>
                </div>
                 <!--flash Message-->
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form method="POST" action="<?php echo e(route('fundPledge.form')); ?>" id="fundPledgeForm">
                    <?php echo csrf_field(); ?>
                    <div class="row donor-section-one">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="name"><strong><?php echo e(__('Donor Name:')); ?>  <span class="required">*</span></strong></label>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="address"><strong><?php echo e(__('Address:')); ?>  <span class="required">*</span></strong></label>
                                <input id="address" type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="city"><strong><?php echo e(__('City:')); ?> </strong></label>
                                <input id="city" type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" value="<?php echo e(old('city')); ?>" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="post_code"><strong><?php echo e(__('Post Code:')); ?></strong></label>
                                <input id="post_code" type="text" class="form-control <?php $__errorArgs = ['post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="post_code" value="<?php echo e(old('post_code')); ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="contact"><strong><?php echo e(__('Contact No:')); ?> <span class="required">*</span></strong></label>
                                <input id="contact" type="text" class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact" value="<?php echo e(old('contact')); ?>" required autofocus>
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
                            <div class="form-group">
                                <label for="email"><strong><?php echo e(__('Contact Email:')); ?></strong></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autofocus>
                                <?php $__errorArgs = ['email'];
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
                    </div>
                    <div class="middel-text"><b>Donor Emergency Contact:</b></div>
                    <div class="row donor-section-two">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="ref_name"><strong><?php echo e(__('Name:')); ?>  <span class="required">*</span></strong></label>
                                <input id="ref_name" type="text" class="form-control <?php $__errorArgs = ['ref_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ref_name" value="<?php echo e(old('ref_name')); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="relationship"><strong><?php echo e(__('Relationship:')); ?></strong></label>
                                <input id="relationship" type="text" class="form-control <?php $__errorArgs = ['relationship'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="relationship" value="<?php echo e(old('relationship')); ?>" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="ref_contact"><strong><?php echo e(__('Contact No:')); ?> <span class="required">*</span></strong></label>
                                <input id="ref_contact" type="text" class="form-control <?php $__errorArgs = ['ref_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ref_contact" value="<?php echo e(old('ref_contact')); ?>" required autofocus>
                                <?php $__errorArgs = ['ref_contact'];
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
                                <label for="ref_email"><strong><?php echo e(__('Contact Email:')); ?></strong></label>
                                <input id="ref_email" type="email" class="form-control <?php $__errorArgs = ['ref_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ref_email" value="<?php echo e(old('ref_email')); ?>" autofocus>
                                <?php $__errorArgs = ['ref_email'];
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
                    </div>

                    <div class="middel-text">
                        <b>My Pledge:</b>
                        <p>By signing below, I/We are committing to the following pledge to IQS Social Development Fund:</p>
                    </div>
                    <div class="row donor-section-three">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="fund_amount"><strong><?php echo e(__('Amount:')); ?>  <span class="required">*</span></strong></label>
                                <input id="fund_amount" type="number" class="form-control <?php $__errorArgs = ['fund_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fund_amount" required>
                                <?php $__errorArgs = ['fund_amount'];
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
                                <label><strong><?php echo e(__('Pledge from:')); ?> <span class="required">*</span></strong></label><br>
                                    <label><input type="radio" name="pledge_clause" id="pledge_clause" value="Zakat"> Zakat</label><br>
                                    <label><input type="radio" name="pledge_clause" id="pledge_clause" value="General Sadaqah"> General Sadaqah</label><br>
                                <?php $__errorArgs = ['pledge_clause'];
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
                                <label><strong><?php echo e(__('Pledge Time:')); ?> <span class="required">*</span></strong></label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time1" name="pledge_time" value="I am paying my entire pledge at this time"> I am paying my entire pledge at this time</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time2" name="pledge_time" value="I will pay my pledge amount on monthly basis"> I will pay my pledge amount on monthly basis</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time3" name="pledge_time" value="I will pay my pledge amount on yearly basis"> I will pay my pledge amount on yearly basis</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time4" name="pledge_time"> Other, Please mention </label>
                                    <span style="visibility:hidden"><input type="text" id="inputField" name="pledge_time_input" class="form-control" placeholder="Writing here..."></span>

                                    <?php $__errorArgs = ['pledge_time'];
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
                                <label for="issue_date"><strong><?php echo e(__('Date')); ?></strong></label>
                                <input type="date" id="issue_date" class="form-control <?php $__errorArgs = ['issue_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="issue_date" value="<?php echo e(old('issue_date')); ?>" autofocus>
                                <?php $__errorArgs = ['issue_date'];
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
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Education Event-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    function myFunction() {
        if (document.getElementById('pledge_time4').checked) {
            document.getElementById('inputField').style.visibility = 'visible';
        } else {
            document.getElementById('inputField').style.visibility = 'hidden';
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/pages/fundPledge.blade.php ENDPATH**/ ?>
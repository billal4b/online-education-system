<?php $__env->startSection('css'); ?>
<style type="text/css">
    .inner-heading h3{ text-align: center;}
   .inner-heading h3:before { background: none;}
   .account-inner {
        display: inline-block;
        width: 100%;
        padding: 40px 30px;
        background: #FFFFFF;
        position: relative;
       padding-top: 100px !important;

   }
   .txt-shadow {
        box-shadow: 0 0 15px 0 rgb(0 0 0 / 10%) !important;
       background:white !important;

    }
   .txt-shadow input{
       height: 50px !important;
   }
   .txt-shadow span{
       top: 8px !important;
       right: 5px !important;
   }
   #account{
       background: white;
   }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
    <!-- cart -->
    <section id="account" class="account section-inner body-color">
        <div class="container">
            <div class="row" style="border-radius: 5px;background-color: #fff;box-shadow: 0 0 4px 0 rgb(0 0 0 / 16%);">
                <!--flash Message-->

                <div class="col-lg-6 col-md-6 col-xs-12 hidden-sm hidden-xs" style="padding: 0;padding-right: 120px;">
                    <div style="background-image: url('../public/images/banner/<?php echo e(!empty($loginBanner)?$loginBanner->image_name:'bg-login.png'); ?>');background-position-x: right; background-repeat: no-repeat;background-size: contain;height: 88vh"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                      <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3 style="font-weight: 600!important;font-size: 2.5rem !important;color: #2f2f2f!important;font-family: Roboto,sans-serif;padding-left: 0;text-align: left;">Login to continue</h3>
                        </div>
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group txt-shadow has-feedback">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required autofocus/>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
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
                            <div class="form-group txt-shadow has-feedback">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required autofocus/>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <?php $__errorArgs = ['password'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if(Route::has('password.request')): ?>
                                        <p><a class="lost_password" href="<?php echo e(route('password.request')); ?>">
                                                <span><?php echo e(__('Forgot Password?')); ?></span>
                                            </a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control mt_btn_yellow" style="height: 50px;font-size: 20px;"><?php echo e(__('Login')); ?></button>
                            </div>
                            <div class="form-group">
                                <p style="font-size: 14px;">Don’t have an account? <a href="/registration"><strong>Registration</strong></a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End store -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>
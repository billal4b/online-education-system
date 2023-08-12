<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Institute of Quranic Studies">
    <title>IQSBD | User</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/images/apple-icon.png')); ?>" >
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('public/images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="36x36"  href="<?php echo e(asset('public/images/android-icon-36x36.png')); ?>">
    <link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/default.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/plugin.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/dashboard.css')); ?>" rel="stylesheet" type="text/css">    
    <link href="<?php echo e(asset('public/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
   
<!-- start Container Wrapper -->
<div id="container-wrapper">
    <!-- Dashboard -->
    <div id="dashboard">
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>  

        <?php echo $__env->make('userend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('userend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- main contents -->
        <div class="dashboard-content">
            <?php echo $__env->yieldContent('main-content'); ?>
        </div>
    </div>
    <!-- Dashboard / End -->
</div>
<!-- end Container Wrapper -->


<!--*Scripts*-->
<script src="<?php echo e(asset('public/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/jquery.easing.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/canvasjs.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/chart.js')); ?>"></script>    
<script src="<?php echo e(asset('public/js/counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/dashboard-custom.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/jpanelmenu.min.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html><?php /**PATH /home2/iqsbdcom/public_html/resources/views/userend/layouts/template.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Institute of Quranic Studies">
    <title>Admin | IQS-BD </title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/apple-icon.png')); ?>" >
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="36x36"  href="<?php echo e(asset('images/android-icon-36x36.png')); ?>">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/default.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/plugin.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet" type="text/css">    
    <link href="<?php echo e(asset('css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
   
<!-- start Container Wrapper -->
<div id="container-wrapper">
    <!-- Dashboard -->
    <div id="dashboard">
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>  

        <?php echo $__env->make('backend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- main contents -->
        <div class="dashboard-content">
            <?php echo $__env->yieldContent('main-content'); ?>
        </div>
    </div>
    <!-- Dashboard / End -->
</div>
<!-- end Container Wrapper -->
    <!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>
<!-- Back to top ends -->

    <!--*Scripts*-->
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/canvasjs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chart.js')); ?>"></script>    
    <script src="<?php echo e(asset('js/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jpanelmenu.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html><?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/backend/layouts/template.blade.php ENDPATH**/ ?>
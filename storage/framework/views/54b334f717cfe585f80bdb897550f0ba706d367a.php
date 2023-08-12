<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $__env->yieldContent('title'); ?> | IQSBD </title>   
    <meta name="description" content="Institute of Quranic Studies">
    
    <!--for fb -->
	<meta property="og:title" content="IQSBD | Institute of Quranic Studies" />
	<meta property="og:site_name" content="Institute of Quranic Studies" />
    <meta property="og:description" content="Quranic Education/language, Online & Offline class Opportunity, Islamic Lifestyle, Video Tutorial, Lecture Sheet" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://iqsbd.com" />
	<meta property="og:image" content="https://iqsbd.com/public/images/iqsbd_social_logo.png"/>
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	<meta name="fb:app_id" property="fb:app_id" content="1174598416027864" />
    
    
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/images/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('public/images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="36x36"  href="<?php echo e(asset('public/images/android-icon-36x36.png')); ?>">
    <link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/default.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/modal-video-min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/plugin.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/magnific-popup.css')); ?>" rel="stylesheet" type="text/css">  
    <link href="<?php echo e(asset('public/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/css/flaticon1.css')); ?>" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
 <!--Other pages template-->
<body class="page">
        <!--*Header*-->
        <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--* End Header*-->

        <!-- Banner -->
        <div id="blog_banner">
            <div class="page-title">
                <div class="container">
                    <h2> <?php echo $__env->yieldContent('title'); ?> </h2>
                </div>
            </div>
            <div class="black-overlay"></div>
        </div>
        <!-- End banner -->

        <?php echo $__env->yieldContent('pages'); ?>
    <!--*Footer*-->
    <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--* End Footer*-->
    <!-- back to top -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
        <span class="fa fa-arrow-up"></span>
    </a>

    <!--*Scripts*-->

    <script src="<?php echo e(asset('public/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.parallax-1.1.3.js')); ?>"></script>    
    <script src="<?php echo e(asset('public/js/jquery.fancybox.pack.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.nav.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/custom-magnificpopup.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/custom-nav.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.appear.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.countTo.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/main.js')); ?>"></script>    
    
<!-- This site is converting visitors into subscribers and customers with Rocketbots - https://rocketbots.io -->
<!--<script src="https://app.rocketbots.io/facebook/chat/plugin/19277/1174598416027864" async></script>-->
<!-- https://rocketbots.io/ -->

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/app.blade.php ENDPATH**/ ?>
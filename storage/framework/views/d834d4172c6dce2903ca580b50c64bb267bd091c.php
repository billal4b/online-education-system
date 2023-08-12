
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .inner-heading h2 span { color: #fc7f0c;}
    h4 { font-size: 20px; }
    .video_title { margin-right: 10px; text-align: center; margin: 10px;}
    .video_title p { margin-bottom: 10px; }
    .pulses { top: 5em; left: 1em; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Today Classes <?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>


    <!-- Start Quran Teaching Course -->
<?php if($crs->course_title == 'Quran Teaching Course'): ?>)    
    <?php echo $__env->make('frontend.pages.today.today_class_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php endif; ?>

<!-- Start Arabic Language Teaching Course -->
<?php if($crs->course_title == 'Arabic Language Teaching Course'): ?>)    
    <?php echo $__env->make('frontend.pages.today.today_class_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('public/js/jquery-modal-video.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/custom-modalvideo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/today/today_class_admin.blade.php ENDPATH**/ ?>
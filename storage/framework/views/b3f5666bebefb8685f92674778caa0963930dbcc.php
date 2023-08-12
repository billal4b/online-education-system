
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
<?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->course_title == 'Quran Teaching Course')): ?>

    <?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'male')): ?>
        <!--* Start Male *-->
        <?php echo $__env->make('frontend.pages.today_class_quran_male', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--* End Male *-->
    <?php endif; ?>

    <?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'female')): ?>
        <!--* Start Male *-->
        <?php echo $__env->make('frontend.pages.today_class_quran_female', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--* End Female *-->
    <?php endif; ?>
<?php endif; ?>
<!-- End Quran Teaching Course -->


<!-- Start Arabic Language Teaching Course -->
<?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->course_title == 'Arabic Language Teaching Course')): ?>

    <?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'male')): ?>
        <!--* Start Male *-->
        <?php echo $__env->make('frontend.pages.today_class_arabic_male', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--* End Male *-->
    <?php endif; ?>

    <?php if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'female')): ?>
        <!--* Start Male *-->
        <?php echo $__env->make('frontend.pages.today_class_arabic_female', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--* End Female *-->
    <?php endif; ?>
<?php endif; ?>
<!-- End Arabic Language Teaching Course -->



    <!--School Going Students -->
    <section id="the-gallery" class="wide-gallery inner-gallery section-inner">
        <div class="container">
            <div class="inner-heading">
                <h3>Quran Learning for School Going Students</span></h3>
            </div>
        </div>
    </section>
    <section id="mt_fun">
            <div class="container">
                <div class="mt-statts">

                    <div class="row facts_row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="nets-facts">
                                <h2>Today Class</h2>
                                <div class="pulses">
                                    <button type="button" class="play-btn js-video-button" data-video-id='<?php echo e($qlss_crs->video_url_id); ?>' data-channel="youtube"><i class="fa fa-play"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--* End Fun And Facts*-->
    <?php echo $__env->make('frontend.pages.today_video_children', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('public/js/jquery-modal-video.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/custom-modalvideo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/today_class.blade.php ENDPATH**/ ?>
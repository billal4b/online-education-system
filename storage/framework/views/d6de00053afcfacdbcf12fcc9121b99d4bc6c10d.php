<section class="features-one">
    <div class="container">
        <div class="inner-heading">
            <h3>Previus Classes</h3>
        </div>

        <div class="row slider slider-ft-course">

            <?php $__currentLoopData = $crs_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="public/images/video_bg_img.jpg" alt="">
                            <div class="video_title">
                                <p><?php echo $course->video_title; ?></p>
                            </div>
                            <div class="pulses">
                                <button type="button" class="play-btn js-video-button" data-video-id='<?php echo $course->video_url_id; ?>' data-channel="youtube"><i class="fa fa-play"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div><!-- /.container -->
</section>
<?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/today_video_quran.blade.php ENDPATH**/ ?>
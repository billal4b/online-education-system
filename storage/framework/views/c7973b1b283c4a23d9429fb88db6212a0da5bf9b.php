<section id="the-gallery" class="wide-gallery inner-gallery section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3>Quran Teaching Course (Male)</span></h3>
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
                            <button type="button" class="play-btn js-video-button" data-video-id='<?php echo e($crs->video_url_id); ?>' data-channel="youtube"><i class="fa fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php echo $__env->make('frontend.pages.today_video_quran', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/today_class_quran_male.blade.php ENDPATH**/ ?>
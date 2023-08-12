<section id="the-gallery" class="wide-gallery inner-gallery section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3>Arabic Language Teaching Course (Male)</span></h3>
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
                            <button type="button" class="play-btn js-video-button" data-video-id='{{ $crs->video_url_id }}' data-channel="youtube"><i class="fa fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>       
@include('frontend.pages.today-class.today_video_arabic')
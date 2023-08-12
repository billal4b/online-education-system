<section id="the-gallery" class="wide-gallery inner-gallery section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3>Arabic Language Teaching Course ({{ $c->gender }})</span></h3>
        </div>
    </div>
</section>

 <section id="mt_fun">
    <div class="container">
        <div class="inner-heading">
            <h2>Today Class</h2>
        </div>
        <div class="row facts_row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/{{ $c->video_url_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                
            </div>
        </div>
    </div>
</section>

<section class="features-one">
    <div class="container">
        <div class="inner-heading">
            <h3>Previus Classes</h3>
        </div>

        <div class="row slider slider-ft-course">

            @foreach ($crs_all as $course)
                @if($course->course_title == 'Arabic Language Teaching Course')
                    <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="featured-item">
                        <!-- new -->
                        <div class="feat-img">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/{{ $course->video_url_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                           
                            <div class="video_title">
                                <p>{!! $course->video_title !!}</p>
                            </div>
                        </div>
                           
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div><!-- /.container -->
</section>

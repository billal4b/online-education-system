<section class="features-one">
    <div class="container">
        <div class="inner-heading">
            <h3>Featured courses</h3>
            <h2>Various courses to choose from</h2>
        </div>

        <div class="row slider slider-ft-course">

            @foreach ($courses as $course)
            <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="public/images/courses/{!! $course->image !!}" alt="">
                            <div class="th-name">
                                <h4>{!! $course->course_name !!}</h4>
                            </div>
                            <div class="overlayPort">
                                <ul class="info text-center list-inline">
                                    <li>
                                        <a href="{!! $course->url !!}">View Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><!-- /.container -->       
</section>
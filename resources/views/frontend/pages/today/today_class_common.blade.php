@extends('frontend.app')
@section('css')
<style type="text/css">
    .inner-heading h2 span { color: #fc7f0c;}
    h4 { font-size: 20px; }
    .video_title { margin-right: 10px; text-align: center; margin: 10px;}
    .video_title p { margin-bottom: 10px; }
    .pulses { top: 5em; left: 1em;}

    .page section.section-inner { padding: 0 0 20px!important;  }
    .padding-top { padding-top: 40px;}
    .inner-heading h3 { text-align: center; padding-top: 40px;}
    .inner-heading h3:before { background: none; }
    .paddding-bottom { }
</style>
@endsection
@section('title') Today Classes @endsection
@section('pages')


<section>
    <div class="container">
        <form action="{{route('todayclass')}}" method="get" autocomplete="off">
            <div class="row padding-top">
                <div class="col-md-2 col-sm-12 col-xs-12"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <select name="course_id" id="course_id">
                        @foreach($select_course as $k=>$v)
                            @if(@$courseId == $k)
                                <option value="{{$k}}" selected>{{$v}}</option>
                            @else
                                <option value="{{$k}}">{{$v}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <button class="mt_btn_yellow" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Start Quran Teaching Course -->
<section id="the-gallery" class="wide-gallery inner-gallery section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3>{{ $todC->courses->course_name  }} ({{ $gender }})</span></h3>
        </div>
    </div>
</section>
<!-- new-->
<section id="mt_fun">
    <div class="container">
        <div class="inner-heading">
            <h2>Today Class</h2>
        </div>
        <div class="row facts_row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/{{ $todC->video_url_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <p>{{ $todC->video_title  }}</p>
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

            @foreach ($preC as $course)
            <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <!-- new -->
                        <div class="feat-img">
                            <!-- 4:3 aspect ratio -->
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/{{ $course->video_url_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>

                            <div class="video_title">
                                <p>{!! $course->video_title !!}</p>
                                <p> <strong>Course: </strong> {!! $course->courses->course_name !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><!-- /.container -->
</section>

@endsection

@section('scripts')
@endsection

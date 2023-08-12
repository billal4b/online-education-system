@extends('frontend.app')
@section('css')
<style type="text/css">
    .inner-heading h2 span { color: #fc7f0c;}
    h4 { font-size: 20px; }
    .video_title { margin-right: 10px; text-align: center; margin: 10px;}
    .video_title p { margin-bottom: 10px; }
    .pulses { top: 5em; left: 1em; }
</style>
@endsection
@section('title') Today Classes @endsection

@section('pages')

<!-- Start Quran Teaching Course -->
@if (@Auth::user()->is_admin == 1 || (@Auth::user()->course_title == 'Quran Teaching Course'))

    @if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'male'))
        <!--* Start Male *-->
        @include('frontend.pages.today-class.today_class_quran_male')
        <!--* End Male *-->
    @endif

    @if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'female'))
        <!--* Start Male *-->
        @include('frontend.pages.today-class.today_class_quran_female')
        <!--* End Female *-->
    @endif
@endif
<!-- End Quran Teaching Course -->


<!-- Start Arabic Language Teaching Course -->
@if (@Auth::user()->is_admin == 1 || (@Auth::user()->course_title == 'Arabic Language Teaching Course'))

    @if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'male'))
        <!--* Start Male *-->
        @include('frontend.pages.today-class.today_class_arabic_male')
        <!--* End Male *-->
    @endif

    @if(@Auth::user()->is_admin == 1 || (@Auth::user()->is_admin != 1 && @Auth::user()->gender == 'female'))
        <!--* Start Male *-->
        @include('frontend.pages.today-class.today_class_arabic_female')
        <!--* End Female *-->
    @endif
@endif
<!-- End Arabic Language Teaching Course -->



    <!--School Going Students -->
    <section id="the-gallery" class="wide-gallery inner-gallery section-inner">
        <div class="container">
            <div class="inner-heading">
                <h3>Arabic Language Course For School Going Students</span></h3>
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
    <!--* End Fun And Facts*-->
    @include('frontend.pages.today-class.today_video_children')

@endsection

@section('scripts')
<script src="{{asset('public/js/jquery-modal-video.min.js')}}"></script>
<script src="{{asset('public/js/custom-modalvideo.js')}}"></script>
@endsection

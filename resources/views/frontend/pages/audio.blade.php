@extends('frontend.app')

@section('title')
    Audio lecture
@endsection

@section('pages')

 <!--* Events*-->
 <section class="edu-events section-inner">
    <div class="container">
        <!-- section title -->
        <div class="inner-heading">
            <h3>Audio lecture</h3>
            <h2>Reserve your Audio class now</h2>
        </div>
        <div class="row">
            @foreach ($audios as $audio)
                <div class="col-md-6 col-sm-12">
                    <div class="event-item">
                        <div class="event-date text-center text-uppercase">
                            <h4 class="mar-0"><span>mp3</span></h4>                                
                        </div> 
                        <div class="event-details">
                            <h3 class="mar-bottom-10"><a href="#">{{ $audio->title }}</a></h3>
                            <ul class="event-time">
                                <li><i class="fa fa-map-marker"></i>{{ $audio->course_title }}</li>
                            </ul>
                            <audio controls>
                                <source src="public/audio/{{ $audio->audio_local }}" type="audio/ogg">
                                <source src="public/audio/{{ $audio->audio_local }}" type="audio/mpeg">
                                <source src="public/audio/{{ $audio->audio_local }}" type="audio/wav">
                                <source src="public/audio/{{ $audio->audio_local }}" type="audio/m4a">
                            </audio>
                        </div>
                    </div>
                </div>                  
            @endforeach
            <div class="col-md-6 col-sm-12">
                {!! $audios->links() !!}
            </div>
        </div><!-- /.row -->
    </div>
</section>


@endsection
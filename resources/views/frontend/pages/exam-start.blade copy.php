@extends('frontend.app')
@section('css') 
<style>
    .dashboard {
        padding-left: 0px;       
    }
    .list-group-item {
        min-height: 150px;
    }       
    .display {
       /* display: none; */
    }
</style>
@endsection
@section('title') Online Exam @endsection
@section('pages')
<section id="mt_contact" class="contact-main section-inner">        
    <div class="container">    
        <div class="row">           
            <div class="col-md-12">   
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Student Name</h4>
                        <p class="list-group-item-text">{{ Auth::user()->name }}</p>                        
                      </a>
                </div>             
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Exam Name</h4>
                        <p class="list-group-item-text">{!! $data->exan_title !!}</p>                      
                      </a>
                </div>             
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Course Name</h4>
                        <p class="list-group-item-text">{!! $data->course_title !!}</p>                        
                      </a>
                </div>             
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading">Time</h4>
                        <p class="list-group-item-text"><span id="time">00:00</span> Minutes!</p>
                      </a>
                </div>          
            </div>  
            <form method="POST" action="{{ route('exam.start') }}" >
                @csrf          
                <div class="col-md-12 display"><br>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}" id="user_name">
                    <input type="hidden" name="exan_title" value="{!! $data->exan_title !!}" id="exan_title">
                    <input type="hidden" name="course_title" value="{!! $data->course_title !!}" id="course_title">
                    @foreach ($questions as $question)
                        <input type="hidden" name="question[]" id="question" value="{!! $question !!}">
                    @endforeach     
                    <br>
                    <div class="text-center">
                        <button type="submit" class="mt_btn_yellow"> {{ __('Start Exam') }}</button>
                    </div>
                </div> 
            </form>     
        </div>      
    </div>   
</section>

@endsection

@section('scripts')   
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var duration = {!! $data->duration !!}
    var fiveMinutes = 60 * duration,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};

</script>
@endsection
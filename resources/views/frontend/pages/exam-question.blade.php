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
     .my-profile textarea {
       height: auto;
    }
</style>
@endsection
@section('title') Online Exam @endsection
@section('pages')
<section id="mt_contact" class="contact-main section-inner">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @include('flash-message')
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Student Name</h4>
                        <p class="list-group-item-text">{{ Auth::user()->name }}</p>
                      </a>
                </div>
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Exam Name</h4>
                        <p class="list-group-item-text">{!! $data->exam_title !!}</p>
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
                        <h4 class="list-group-item-heading">End Time</h4>
                        <p class="list-group-item-text">
                             @php
                             $end_time = (!empty($data) ? $data->end_time:'' );
                             $end_time = date("h:i a",strtotime($end_time));
                            echo($end_time);@endphp
                        </p>
                      </a>
                </div>

            </div>
            <form method="POST" action="{{ route('exam.submit', $data->id) }}" >
                @csrf
                <div class="col-md-12 display"><br>
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_name" id="user_name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="exam_title" id="exam_title" value="{!! $data->exam_title !!}">
                    <input type="hidden" name="course_title" id="course_title" value="{!! $data->course_title !!}">
                    @php
                        $test = json_decode($answer, true);
                        $a = [];
                       // dd($test);
                    @endphp

                    @foreach ($test as $t)
                        @foreach ($t as $key => $val)
                            @php $a[$key] = $val; @endphp
                        @endforeach
                    @endforeach

                    @foreach ($a as $k => $v)
                        <label for="{!! $k !!}"> <strong style="font-size: 25px;">{!! $k !!}</strong> </label>
                        <div class="form-group has-success has-feedback">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <textarea name="question[{!! trim($k) !!}]"  class="form-control"  rows="7" style="font-size: 20px;">{!! $v !!}</textarea>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <button type="submit" id="my-btn" name="submit" class="mt_btn_yellow" disabled>{{ __('Submit Your Answer') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
@php
    $start_time = (!empty($data) ? $data->start_time:'');
    $end_time = (!empty($data) ? $data->end_time:'' );
@endphp
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


var myStartTime = '{!! $start_time !!}';
var myEndTime ='{!! $end_time !!}';
var buttonEnableTimerId = null;
var buttonDisableTimerId = null;
$(document).ready(function(){
  buttonEnable();
  buttonDisable();
  setTimeout(() => {
  buttonEnableTimerId = setInterval(() => buttonEnable(), 1000);
  buttonDisableTimerId = setInterval(() => buttonDisable(), 1000);
  }, 1000);
//   $("#my-btn").click(function(){
//     alert("Hello, I am alert.");
//   });
});
function buttonEnable() {
  var sTime = new Date();
  var eTime = new Date(myStartTime);
  if (calculateTime(sTime, eTime) <= 0) {
  	// Exam time start button enable and clear button enable timer id
    $("#my-btn").prop("disabled", false);
    clearInterval(buttonEnableTimerId);
  }
}
function buttonDisable() {
  var sTime = new Date();
  var eTime = new Date(myEndTime);
  if (calculateTime(eTime, sTime) >= 0) {
  	// Exam time start button enable and clear button enable timer id
    $("#my-btn").prop("disabled", true);
    clearInterval(buttonDisableTimerId);
  }
}
function calculateTime(startTime, endTime) {
  //console.log('startTime==', startTime, 'endTime=', endTime)
  var snTime = startTime.getTime();
  var enTime = endTime.getTime();
  var diff = enTime - snTime;
  var diffInSec = (diff / 1000);
  //console.log('diffInSec==', diffInSec);
  return diffInSec;
}
</script>
@endsection

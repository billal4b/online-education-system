@extends('backend.layouts.template')
@section('css')
<link href="{{asset('public/css/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css">
<style>
    #course_title {
        margin-left: 20px;
    }
    .my-profile textarea {
       height: auto;
    }
 
</style>
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.question.store') }}" method="post">
            @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Exam <a href="{{ url()->previous() }}"><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="exam_title"><strong>{{ __('Exam Title') }}</strong></label>
                            <input id="exam_title" name="exam_title" type="text" class="form-control @error('exam_title') is-invalid @enderror" required autocomplete="exam_title" autofocus>
                                @error('exam_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-group">
                                @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label><strong>Select Courses :</strong></label>
                                @foreach ($courses as $course)
                                    <label><input type="checkbox" name="course_title" id="course_title" value="{{ $course->course_name }}" onclick="onlyOne(this)"> {{ $course->course_name }}</label>
                                @endforeach
                            </div><br>
                            <label for="question"><strong>{{ __('Question (Ex - 1.Q || 2.Q || 3.Q || 4.Q )') }}</strong></label>
                            <textarea id="question" name="question" type="text" style="font-size: 20px; class="form-control @error('question') is-invalid @enderror" rows="15" required></textarea>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   <br>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <label for="start_time"><strong>{{ __('Date') }}</strong></label>
                                        <input id="start_time" name="start_time" type="text" class="form-control datetimepicker @error('start_time') is-invalid @enderror" required>
                                            @error('start_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <label for="duration"><strong>{{ __('Duration') }}</strong></label>
                                        <input id="duration" name="duration" type="text" class="form-control @error('duration') is-invalid @enderror">
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </div><br>
                        <button type="submit" class="button">{{ __('Save') }}</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('public/js/jquery.datetimepicker.full.js')}}"></script>

<script type="text/javascript">
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_title')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    jQuery(document).ready(function () {
                'use strict';
                jQuery('#start_time').datetimepicker();
            });

</script>
@endsection

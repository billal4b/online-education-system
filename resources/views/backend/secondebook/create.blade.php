@extends('backend.layouts.template')
@section('css')
    <link href="{{asset('public/css/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('main-content')
    <div class="dashboard-form">
        <div class="row">
            <form action="{{ route('admin.secondebook.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Profile -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Add eBook <a href="{{ route('admin.ebook') }}"><span
                                    class="button gray">List</span></a></h4>
                        <div class="dashboard-list-box-static">

                            <!-- Details -->
                            <div class="my-profile">
                                <label for="published">
                                    <input type="checkbox" name="published" id="published">
                                    Publish?
                                </label>
                                <label for="publish_time" class="publish_date"><strong>Date</strong></label>
                                <input id="publish_time" name="publish_time" type="text"
                                       class="form-control datetimepicker publish_date">


                                <label for="course_id"><strong>{{ __('Course Name') }}</strong></label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                    <option value="">Select Course</option>
                                    @foreach(COURSE_NAME as $courseKey=>$courseName)
                                        <option value="{{$courseKey}}">{{$courseName}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <label for="subject_type"><strong>{{ __('Subject Type') }}</strong></label>
                                <select name="subject_type" id="subject_type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    @foreach(SUBJECT_TYPE as $stypeKey=>$stypeName)
                                        <option value="{{$stypeKey}}">{{$stypeName}}</option>
                                    @endforeach
                                </select>
                                @error('subject_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <label for="topic"><strong>{{ __('Topic') }}</strong></label>
                                <input id="topic" name="topic" type="text"
                                       class="form-control @error('topic') is-invalid @enderror" required autofocus>
                                @error('topic')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="row">
                                    <div class="col-md-12">Content Type</div>
                                    <div class="col-md-2">
                                        <label for="content_type_both">
                                            <input type="radio" name="content_type" id="content_type_both"
                                                   value="{{EBOOK_BOTH}}" checked="checked">
                                            Both
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="content_type_content">
                                            <input type="radio" name="content_type" id="content_type_content"
                                                   value="{{EBOOK_CONTENT}}">
                                            Editor
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="content_type_document">
                                            <input type="radio" name="content_type" id="content_type_document"
                                                   value="{{EBOOK_DOCUMENT}}">
                                            Document
                                        </label>
                                    </div>

                                </div>

                                <label for="content" class="content_area"><strong>{{ __('Content') }}</strong></label>
                                <textarea id="content" name="content"
                                          class="content_area form-control tinymce @error('content') is-invalid @enderror"
                                          required> </textarea><br>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="document" class="document_area"><strong>{{ __('PDF File') }}</strong></label>
                                <input id="document" name="document" type="file"
                                    class="document_area form-control @error('document') is-invalid @enderror" accept="application/pdf" autofocus>
                                @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
    <script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            'use strict';
            jQuery('#publish_time').datetimepicker();
            $('.publish_date').hide();
            $('#published').change(function () {
                if ($(this).is(':checked')) {
                    $('.publish_date').show();
                } else {
                    $('.publish_date').hide();
                }
            })
            $('#content_type_both').change(function () {
                if ($(this).is(':checked')) {
                    $('.content_area,.document_area,#mceu_22').show();
                } else {
                    $('.content_area,.document_area,#mceu_22').hide();
                }
            })
            $('#content_type_content').change(function () {
                if ($(this).is(':checked')) {
                    $('#mceu_22').show();
                    $('.document_area').hide();
                } else {
                    $('.content_area').hide();
                }
            })
            $('#content_type_document').change(function () {
                if ($(this).is(':checked')) {
                    $('.document_area').show();
                    $('.content_area,#mceu_22').hide();
                } else {
                    $('.document_area').hide();
                }
            })
        })
    </script>

@endsection

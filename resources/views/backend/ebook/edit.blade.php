@extends('backend.layouts.template')
@section('css')
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.ebook.update', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            @include('flash-message')
            <div class="dashboard-list-box">
                <h4 class="gray">Update eBook <a href="{{ url()->previous() }}"><span class="button gray">List</span></a></h4>
                <div class="dashboard-list-box-static">
                    <!-- Details -->
                    <div class="my-profile">
                        <label for="course_title"><strong>{{ __('Course Name') }}</strong></label>
                            <input id="course_title" name="course_title" type="text" value="{{ $edit->course_title }}" class="form-control @error('course_title') is-invalid @enderror" required autofocus>
                                @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <label for="subject"><strong>{{ __('Subject') }}</strong></label>
                        <input id="subject" name="subject" type="text"  value="{{ $edit->subject }}" class="form-control @error('subject') is-invalid @enderror" required autofocus>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="subject_code"><strong>{{ __('Subject Code') }}</strong></label>
                        <input id="subject_code" name="subject_code" type="text"  value="{{ $edit->subject_code }}" class="form-control @error('subject_code') is-invalid @enderror"  autofocus>
                            @error('subject_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="content"><strong>{{ __('Content') }}</strong></label>
                        <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror" required>  {{ $edit->content }}</textarea><br>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="section"><strong>{{ __('Section') }}</strong></label>
                            <select name="section" id="section" class="form-control">
                                <option value="1" {{ $edit->section == 1 ? 'selected' : '' }}>ইসলামিয়াত</option>
                                <option value="2" {{ $edit->section == 2 ? 'selected' : '' }}>দুয়া</option>
                                <option value="3" {{ $edit->section == 3 ? 'selected' : '' }}>এরাবিক</option>
                                <option value="4" {{ $edit->section == 4 ? 'selected' : '' }}>অন্যন্য</option>
                            </select>
                        <label for="pdf_file"><strong>{{ __('PDF File') }}</strong></label>
                        <input id="pdf_file" name="pdf_file" type="file" class="form-control @error('pdf_file') is-invalid @enderror" accept="application/pdf" autofocus>
                        <p>{{ $edit->pdf_file }}</p>
                        @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                       <label for="is_active"><strong>{{ __('Status') }}<strong></label>
                        <select id="type" name="is_active" class="form-control">
                            <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div><br>
                    <button type="submit" class="button">{{ __('Update') }}</button>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')

<script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
@endsection

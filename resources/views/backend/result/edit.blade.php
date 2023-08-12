@extends('backend.layouts.template')
@section('css')
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.result.update', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            @include('flash-message')
            <div class="dashboard-list-box">
                <h4 class="gray">Update Result <a href="{{ url()->previous() }}"><span class="button gray">List</span></a></h4>
                <div class="dashboard-list-box-static">
                    <!-- Details -->
                    <div class="my-profile">
                        <label for="course_title"><strong>{{ __('Class/Course Name') }}</strong></label>
                            <input id="course_title" name="course_title" type="text" value="{{ $edit->course_title }}" class="form-control @error('course_title') is-invalid @enderror" required autofocus>
                                @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                        <label for="exam_name"><strong>{{ __('Exam Name') }}</strong></label>
                        <input id="exam_name" name="exam_name" type="text" value="{{ $edit->exam_name }}" class="form-control @error('exam_name') is-invalid @enderror" required autofocus>
                            @error('exam_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror      

                        <label for="subject_name"><strong>{{ __('Subject Name') }}</strong></label>
                        <input id="subject_name" name="subject_name" type="text" value="{{ $edit->subject_name }}" class="form-control @error('subject_name') is-invalid @enderror" required autofocus>
                            @error('subject_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            
                        <label for="pdf_file"><strong>{{ __('Exam Sheet ( pdf format )') }}</strong></label>
                        <input id="pdf_file" name="pdf_file" value="{{ $edit->pdf_file }}" type="file" class="form-control @error('pdf_file') is-invalid @enderror" accept="application/pdf" autofocus>
                        @error('pdf_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                        <br>
                        <iframe src="/public/result/{{ $edit->pdf_file }}" height="150" width="150"></iframe>
                        <br><br>
                    </div>
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

@endsection

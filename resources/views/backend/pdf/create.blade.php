@extends('backend.layouts.template')
@section('css')
<style>
.audio-file, .video-file, .pdf-file {
    display:none;
}
#course_id {
    margin-left: 20px;
}
</style>
@endsection
@section('main-content')
<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.pdf.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">New File Add <a href="{{ url()->previous() }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">

                        <!-- Details -->
                        <div class="my-profile">

                            <label for="title"><strong>{{ __('Title') }}</strong></label>
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" required autofocus>
                                @error('title')
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
                                <label><strong>Select Course :</strong></label>
                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="course_id" id="course_id" value="{{ $k }}" onclick="onlyOne(this)"> {{ $v }}</label>
                                @endforeach
                            </div>
                            <label for="content"><strong>{{ __('Content') }}</strong></label>
                            <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror" required> </textarea><br>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="pdf_file"><strong>{{ __('Lecture Sheet ( pdf format)') }}</strong></label>
                            <input id="pdf_file" name="pdf_file" type="file" class="form-control @error('pdf_file') is-invalid @enderror" accept="application/pdf" autofocus>
                            <br>
                            @error('pdf_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="button">{{ __('Save') }}</button>

                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>


    </div>

@endsection
@section('scripts')
<script type="text/javascript">
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_id')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
   </script>

<script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
@endsection

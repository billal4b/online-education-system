@extends('backend.layouts.template')
@section('css')
<style>
#course_id {
    margin-left: 20px;
}
</style>
@endsection
@section('main-content')
<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.pdf.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update pdf file <a href="{{ route('admin.pdf') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="title"><strong>{{ __('Title') }}</strong></label>
                            <input id="title" name="title" type="text" value="{{ $edit->title }}" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-group">
                                <label><strong>Select Course :</strong></label>
                                @php
                                    $id= $edit->course_id;
                                @endphp
                                @foreach ($courses as $k=>$v)
                                    <label>
                                        <input type="checkbox" name="course_id" id="course_id" @if ($k == $id ) checked @endif value="{{ $k }}" onclick="onlyOne(this)"> {{ $v }}</label>
                                @endforeach
                                    @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <br>
                            <label for="content"><strong>{{ __('Content') }}</strong></label>
                            <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror" required> {{ $edit->content }}</textarea><br>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="pdf_file"><strong>{{ __('Lecture Sheet ( pdf format)') }}</strong></label>
                                <input id="pdf_file" name="pdf_file" type="file" class="form-control @error('pdf_file') is-invalid @enderror" accept="application/pdf" autofocus>

                                @error('pdf_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p><a href="/public/pdf/{{ $edit->pdf_file }}" target="_blank">{{ $edit->pdf_file }}</a></p>


                            <label for="is_active"><strong>{{ __('Status') }}</strong></label>
                            <select id="type" name="is_active" class="form-control">
                                <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>

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

<script type="text/javascript">
   // document.getElementById('course_title').value = '{{ $edit->course_title }}';

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

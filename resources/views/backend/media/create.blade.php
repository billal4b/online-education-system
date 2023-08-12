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
        <form  action="{{ route('admin.media.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Media <a href="{{ route('admin.media') }}"><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">

                        <!-- Details -->
                        <div class="my-profile">

                            <label for="title"><strong>{{ __('Title') }}</strong></label>
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          <br>

                            <label for="file_type"><strong>{{ __('File Format') }}</strong></label>
                            <select id="file_type" name="file_type" class="form-control" required>
                                <option>-- Select Format--</option>
                                <option value="audio">Audio File</option>
                                <option value="video">Video File</option>
                            </select>

                            <div id="audio-file" style="display: none">
                                <label for="audio"><strong>{{ __('Audio URL') }}</strong></label>
                                <input id="audio" name="audio" type="text" class="form-control @error('audio') is-invalid @enderror" autocomplete="audio" autofocus>
                                @error('audio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div id="video-file" style="display: none">
                                <label for="video"><strong>{{ __('YouTube Video Embed URL') }}</strong></label>
                                <input id="video" name="video" type="text" class="form-control @error('video') is-invalid @enderror" placeholder="https://" autocomplete="video" autofocus>

                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                 @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label><strong>Select Courses :</strong></label>
                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="course_id" id="course_id" value="{{ $k }}" onclick="onlyOne(this)"> {{ $v }}</label>
                                @endforeach


                            </div>

                            <label for="order"><strong>{{ __('Order') }}</strong></label>
                            <input id="order" name="order" type="number" class="form-control @error('order') is-invalid @enderror"  autocomplete="order" autofocus>
                                @error('order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

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

<script type="text/javascript">

 $('#file_type').change(function(){

        if( $(this).val() == 'audio'){
            $('#audio-file').show();
        }else{
            $('#audio-file').hide();
        }

        if( $(this).val() == 'video'){
            $('#video-file').show();
        }else{
            $('#video-file').hide();
        }

    });

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_id')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }


</script>
@endsection

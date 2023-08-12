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
        <form  action="{{ route('admin.media.update', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Update Media <a href="{{ route('admin.media') }}" ><span class="button gray">List</span></a></h4>
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


                        <label for="file_type"><strong>{{ __('Select Media Format') }}</strong></label>
                        <select id="file_type" name="file_type" class="form-control">
                            <option> ---- Select ---</option>
                            <option value="audio" {{ $edit->file_type == 'audio' ? 'selected' : '' }}>Audio File</option>
                            <option value="video" {{ $edit->file_type == 'video' ? 'selected' : '' }}>Video File</option>
                        </select>

                        <div id="audio-file" style="display: none">
                            <label for="audio"><strong>{{ __('Audio URL') }}</strong></label>
                            <input id="audio" name="audio" type="text" value="{{ $edit->audio }}" class="form-control @error('audio') is-invalid @enderror" autocomplete="audio" autofocus>
                            @error('audio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div id="video-file" style="display: none">
                            <label for="video"><strong>{{ __('YouTube Video Embed URL') }}</strong></label>
                            <input id="video" name="video" type="text" value="{{ $edit->video }}" class="form-control @error('video') is-invalid @enderror" autocomplete="video" autofocus>

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><strong>Select Courses :</strong></label>
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $k=>$v )
                                    <option value="{{ $k}}">{{ $v }} </option>
                                @endforeach
                            </select>
                        </div>


                        <label for="order"><strong>{{ __('Order') }}</strong></label>
                        <input id="order" name="order" type="number" value="{{ $edit->order }}" class="form-control @error('order') is-invalid @enderror"  autocomplete="order" autofocus>
                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

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

document.getElementById('course_id').value = '{{ $edit->course_id }}';


$(function() {
    $('#file_type').change(function(){
        fileType();
    });

    fileType();

})

  function fileType(){

    var that = $("#file_type");

    if (that.val() == 'audio'){
            $('#audio-file').show();
        }else{
            $('#audio-file').hide();
        }

        if (that.val() == 'video'){
            $('#video-file').show();
        }else{
            $('#video-file').hide();
        }
  }

</script>
@endsection

@extends('backend.layouts.template')
@section('css')
<style>
    #course_title {
        margin-left: 20px;
    }
</style>
@endsection
@section('main-content')    
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.audio.store') }}" method="post" enctype="multipart/form-data">
            @csrf                
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Audio <a href="{{ url()->previous() }}"><span class="button gray">List</span></a></h4>
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
                            </div>
                            
                            <label for="audio_local"><strong>{{ __('Audio File') }}</strong></label>
                            <input id="audio_local" name="audio_local" type="file" class="form-control @error('audio_local') is-invalid @enderror" required autofocus>
                                @error('audio_local')
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


    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_title')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
      

</script>
@endsection
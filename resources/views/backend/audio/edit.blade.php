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
        <form  action="{{ route('admin.audio.update', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf                
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Update Audio file <a href="{{ url()->previous() }}" ><span class="button gray">List</span></a></h4>
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
                                $crs_name = $edit->course_title ;                                                  
                                @endphp
                                @foreach ($courses as $course)
                                    <label>
                                        <input type="checkbox" name="course_title" id="course_title" @if ($course->course_name == $crs_name ) checked @endif value="{{ $course->course_name }}" onclick="onlyOne(this)"> {{ $course->course_name }}</label>
                                @endforeach      
                                    @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <br>

                        <label for="audio_local"><strong>{{ __('Audio File') }}</strong></label>
                            <input id="audio_local" name="audio_local" type="file"  value="{{ $edit->audio_local }}"  class="form-control @error('audio_local') is-invalid @enderror" autofocus>
                                @error('audio_local')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                <p>File: {{ $edit->audio_local }}</p>
                               <br>
                        <label for="is_active"><strong>{{ __('Status') }}</strong></label>
                        <select id="type" name="is_active" class="form-control">    
                            <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select> 
                        <br>
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

function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_title')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }  

</script>
@endsection
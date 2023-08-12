@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            <form  action="{{  route('admin.course.details.update', $edit->id) }}" method="post">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Course Name <a href="{{ route('admin.course.details') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="course_name">{{ __('Course Name') }}</label>
                            <select name="section_disabled" id="course_name" class="form-control" disabled>
                                @foreach($courses as $course )
                                    <option value="{{ $course->course_name }}">{{ $course->course_name }} </option>
                                @endforeach
                            </select>   
                            <input name="course_name" value="{{ $edit->course_name }}" type="hidden"> 
                            @error('course_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  

                            <label for="course_details">{{ __('Course Information English') }}</label>
                            <textarea  id="course_details" name="course_details" class="form-control tinymce @error('course_details') is-invalid @enderror">{{ $edit->course_details }}</textarea><br>
                                @error('course_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        
                            <label for="course_details_bd">{{ __('Course Information Bengla') }}</label>
                            <textarea  id="course_details_bd" name="course_details_bd" class="form-control tinymce @error('course_details_bd') is-invalid @enderror">{{ $edit->course_details_bd }}</textarea><br>
                                @error('course_details_bd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
 
                                
                            <label for="is_active">{{ __('Status') }}</label>
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
<script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
<script>
    document.getElementById('course_name').value = '{{ $edit->course_name }}';
</script>
@endsection
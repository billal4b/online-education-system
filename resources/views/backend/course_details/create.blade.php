@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            <form  action="{{  route('admin.course.details.store') }}" method="post" novalidate>
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Course Information<a href="{{ route('admin.course.details') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="course_name">{{ __('Course Name') }}</label>
                                <select name="course_name" id="course_name" class="form-control">
                                    @foreach($courses as $course )
                                        <option value="{{ $course->course_name }}">{{ $course->course_name }} </option>
                                    @endforeach
                                </select>   
                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  

                            <label for="course_details">{{ __('Course Information English') }}</label>
                            <textarea  id="course_details" name="course_details" class="form-control tinymce @error('course_details') is-invalid @enderror"></textarea><br>
                                @error('course_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        
                            <label for="course_details_bd">{{ __('Course Information Bengla') }}</label>
                            <textarea  id="course_details_bd" name="course_details_bd" class="form-control tinymce @error('course_details_bd') is-invalid @enderror"></textarea><br>
                                @error('course_details_bd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     

         

                            <label for="is_active">{{ __('Status') }}</label>
                            <select id="type" name="is_active" class="form-control">    
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>                                                                           

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
<script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
<script>
    $(function() {
        $("#image").change(function() {
            console.log('image changed');
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
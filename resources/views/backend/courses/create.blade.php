@extends('backend.layouts.template')
@section('css')
<style>
    #imageSize img{
        max-width:100px;
    }
    input[type=file]{ padding:10px; background:#2d2d2d;}
</style>
@endsection
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            <form  action="{{  route('admin.course.store') }}" method="post" novalidate enctype="multipart/form-data">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Course Name<a href="{{ route('admin.course') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="course_name">{{ __('Course Name') }}</label>                           
                            <input id="course_name" name="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" required autocomplete="course_name" autofocus>
                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            <div id="imageSize">
                                <label for="image">{{ __('Image (NB:360x245)') }}</label>
                                <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" autocomplete="image" autofocus><br>
                                <img src="http://placehold.it/180" id="blah" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div>    

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
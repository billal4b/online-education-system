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
                    
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <form  action="{{  route('admin.course.update', $edit->id) }}" method="post">
                    @csrf    
                <h4 class="gray">Update Course Name <a href="{{ route('admin.course') }}" ><span class="button gray">List</span></a></h4>
                <div class="dashboard-list-box-static">
                    
                    <!-- Details -->
                    <div class="my-profile">

                        <label for="course_name">{{ __('Name') }}</label>
                        <input id="course_name" name="course_name" value="{{ $edit->course_name }}" type="text" class="form-control @error('course_name') is-invalid @enderror" required autocomplete="course_name" autofocus>
                            @error('course_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        
                        <label for="category">{{ __('Category') }}</label>
                        <select id="category" name="category" class="form-control">    
                            <option value="1" {{ $edit->category == 1 ? 'selected' : '' }}>Registered User</option>
                            <option value="0" {{ $edit->category == 0 ? 'selected' : '' }}>Admitted User</option>
                        </select> 
                        
                        <label for="order">{{ __('Order') }}</label>
                        <input id="order" name="order" type="number" value="{{ $edit->order }}" class="form-control @error('order') is-invalid @enderror"  autocomplete="order" autofocus>
                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            
                        <div id="imageSize">    
                            <label for="image">{{ __('Image (NB:327x245)') }}</label>
                            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" autocomplete="image"><br>                                  
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            <img src="/public/images/courses/thumb/{{ $edit->image }}" id="blah" name="image">    
                        </div> 

                        <label for="is_active">{{ __('Status') }}</label>
                        <select id="type" name="is_active" class="form-control">    
                            <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select> 
                    </div>
                    <button type="submit" class="button">{{ __('Update') }}</button>
                </div> 
            </form>
                
            </div>
        </div>
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
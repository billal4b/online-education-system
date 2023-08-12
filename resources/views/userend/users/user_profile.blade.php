@extends('userend.layouts.template')
@section('css')
    <style>
        .my-profile span { float: right; }
        label { background-color: #e0e0e0; padding: 5px 15px;}       
        .btn-primary {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp { margin-bottom:15px; }
        input[type=file] { height: auto; padding: 0px; }  
        img { margin-bottom: 10px;}   
        label .sub-btn-color {margin-top: 2px; background-color: azure;}  
        .course {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
@endsection
@section('main-content')    
<div class="dashboard-form">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
    </div>
   </div>
        <div class="row">  
              
            <div class="col-lg-2 col-md-3 col-xs-12 imgUp" align="center">   
                
                <img src="{{asset('public/images/profile')}}/{{ Auth::user()->image }}" id="blah" alt="{{ Auth::user()->name }}">
                <form  action="{{ route('user.profile.picture', Auth::user()->id) }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf                              
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">  
                    <label class="btn btn-primary">Upload Picture
                        <input type="file" id="image" name="image" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    <br>
                    <label for="image" style="margin-top: 5px; background-color: #333a65; color:#fff"><button type="submit">{{ __('Submit Here') }}</button></label>
                </form>
            </div>  
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">My Profile<a href="{{ route('user.profile.edit', Auth::user()->id) }}" ><span class="button gray">Edit Profile</span></a></h4>
                    <div class="dashboard-list-box-static">
                       <div class="course"> 
                           @if (!empty(Auth::user()->select_course))
                                @foreach(Auth::user()->select_course as $v)
                                    @isset($courses[$v])
                                       <strong>{{ $courses[$v] }}</strong>,
                                    @endisset
                                 @endforeach
                            @endif
                        </div>
                        <div class="my-profile">
                            <label><strong>{{ __('Name') }}</strong><span> {{ Auth::user()->name }}</span></label>
                            <label><strong>{{ __('Contact') }}</strong><span> {{ Auth::user()->mobile }}</span></label>
                            <label><strong>{{ __('E-Mail') }}</strong><span> {{ Auth::user()->email }}</span></label>
                            <label><strong>{{ __('Gender') }}</strong><span> {{ Auth::user()->gender }}</span></label>
                            <label><strong>{{ __('Blood Group') }}</strong><span> {{ Auth::user()->blood_group }}</span></label>                           
                            <label><strong>{{ __('Birth of Date') }}</strong><span> {{ Auth::user()->dob }}</span></label>
                            <label><strong>{{ __('Address') }}</strong><span> {{ Auth::user()->address }}</span></label>
                            <label><strong>{{ __('BR/NID') }}</strong><span> {{ Auth::user()->nid_no }}</span></label>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-lg-2 col-md-6 col-xs-12"></div>           
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

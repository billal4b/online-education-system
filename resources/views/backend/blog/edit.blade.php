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
        <form  action="{{ route('admin.blog.update', $edit->id) }}" method="post" novalidate enctype="multipart/form-data">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Blog <a href="{{ route('admin.blog') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">                            

                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" name="title" value="{{ $edit->title }}" type="text" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror      
                            <label for="excerpt">{{ __('Excerpt') }}</label>
                            <textarea id="excerpt" name="excerpt" class="form-control @error('excerpt') is-invalid @enderror"> {{ $edit->excerpt }} </textarea>
                                @error('excerpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="content">{{ __('Post Content') }}</label>
                            <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror"> {{ $edit->content }} </textarea><br>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 

                            <div class="row" id="imageSize">    
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="image">{{ __('Image (NB:1000x550)') }}</label>
                                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" autocomplete="image"><br>                                  
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 

                                    <img src="/public/images/blog/thumb/{{ $edit->image }}" id="blah" name="image">    
                                </div> 
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="date_time">{{ __('Publish Date') }}</label>
                                    <input id="date_time" name="date_time" value="{{ $edit->date_time }}" type="date" class="form-control @error('date_time') is-invalid @enderror" autocomplete="date_time" autofocus>
                                        @error('date_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>      
                            </div> <br>     
                                
                            <label for="is_active">{{ __('Publication Status') }}</label>
                            <select id="type" name="is_active" class="form-control">    
                                <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Unpublish</option>
                            </select> 

                        </div>
                        <button type="submit" class="button">{{ __('Update') }}</button>
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
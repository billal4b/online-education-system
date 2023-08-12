@extends('backend.layouts.template')
@section('css')
<style></style>
@endsection
@section('main-content')    

<div class="dashboard-form">
    <div class="row">
        @include('flash-message')
        <form  action="{{ route('admin.notice.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Notice <a href="{{ url()->previous() }}"><span class="button gray">Back</span></a></h4>
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
                            <label for="content">{{ __('Notice Content') }}</label>
                            <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror" required> {{ $edit->content }} </textarea><br>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            <div class="row">    
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="file">{{ __('PDF File') }}</label>
                                    <input id="file" name="file" type="file" class="form-control @error('file') is-invalid @enderror" autocomplete="file"><br>                                  
                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div> 
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="publish_at">{{ __('Publish Date') }}</label>
                                    <input id="publish_at" name="publish_at" value="{{ $edit->publish_at }}" type="date" class="form-control @error('publish_at') is-invalid @enderror" required autocomplete="publish_at" autofocus>
                                        @error('publish_at')
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
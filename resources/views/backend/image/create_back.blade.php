@extends('backend.layouts.template')
@section('css')
<style>
.image-file, .audio-file, .video-file {
    display:none;
}
</style>
@endsection
@section('main-content')    
<div class="dashboard-form">
        <div class="row">
                          
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Image <a href="{{ route('admin.image') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">

                        <form  action="{{ route('admin.image.store') }}" method="post" enctype="multipart/form-data">
                            @csrf  
                            <div class="my-profile">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   

                                <label for="image_type">{{ __('Select Image Category') }}</label>
                                <select id="image_type" name="image_type" class="form-control">    
                                    <option>-- Select --</option>
                                    <option value="banner">Banner (NB: 1900x500)</option>
                                    <option value="gallery">Gallery (NB: 1000x550)</option>
                                </select> 
                            
                                <label for="image_name">{{ __('Image') }}</label>
                                <input id="image_name" name="image_name" type="file" class="form-control @error('image_name') is-invalid @enderror" autocomplete="image_name" autofocus>
                                
                                @error('image_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                              
                            

                            </div>
                            <button type="submit" class="button">{{ __('Save') }}</button>
                        </form>
                        </div>                       
                    </div>
                </div>
            </div>           
        </div>
    </div>  
    
@endsection


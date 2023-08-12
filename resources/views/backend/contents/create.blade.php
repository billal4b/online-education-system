@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.content.store') }}" method="post" novalidate>                
                @csrf 
               
                <!-- Profile -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Add Content <a href="{{ route('admin.content') }}" ><span class="button gray">List</span></a></h4>
                        <div class="dashboard-list-box-static">
                            
                            <!-- Details -->
                            <div class="my-profile">

                                <label for="section_name">{{ __('Section Name') }}</label>
                                <select name="section_name" id="section_name" class="form-control">
                                    @foreach($sections as $section )
                                        <option value="{{ $section->section_name }}">{{ $section->section_name }} </option>
                                    @endforeach
                                </select>                        
                                    @error('section_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror 
                                    
                                <label for="title">{{ __('Post Title') }}</label>
                                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 

                                <label for="content">{{ __('Post Content') }}</label>
                                <textarea  id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror" required></textarea><br>
                                    @error('content')
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
@endsection
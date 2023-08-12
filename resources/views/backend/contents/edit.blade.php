@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.content.update', $edit->id) }}" method="post">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Content <a href="{{ route('admin.content') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="section_name">{{ __('Section Name') }}</label>
                            <select name="section_name" id="section_name" class="form-control">
                                @foreach($sections as $section )
                                    <option value="{{ $section->section_name }}">{{ $section->section_name }} </option>                                    
                                @endforeach
                            </select>     

                            <label for="title">{{ __('Post Title') }}</label>
                            <input id="title" name="title" value="{{ $edit->title }}" type="text" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror      

                            <label for="content">{{ __('Post Content') }}</label>
                            <textarea  id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror">{{ $edit->content }}</textarea><br>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            <label for="order">{{ __('Order') }}</label>
                            <input id="order" name="order" value="{{ $edit->order }}" type="text" class="form-control @error('order') is-invalid @enderror" autocomplete="order">
                                @error('order')
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
        </form>
    </div>
</div>  
    
@endsection

@section('scripts')
    <script src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('public/js/tinymce/init-tinymce.js')}}"></script>
    <script type="text/javascript">
        document.getElementById('section_name').value = '{{ $edit->section_name }}';
    </script>
@endsection
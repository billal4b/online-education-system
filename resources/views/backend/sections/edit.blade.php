@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            <form  action="{{  route('admin.section.update', $edit->id) }}" method="post">
                @csrf 
               
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Section <a href="{{ route('admin.section') }}" ><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <div class="my-profile">

                            <label for="section_name">{{ __('Section Name') }}</label>
                            <input id="section_name" name="section_name" value="{{ $edit->section_name }}" type="text" class="form-control @error('section_name') is-invalid @enderror" required autocomplete="section_name" autofocus>
                                @error('section_name')
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
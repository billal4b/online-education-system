@extends('backend.layouts.template')
@section('main-content')    

<div class="dashboard-form">
        <div class="row">
            @include('flash-message')
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Databsde Backup</h4>
                    <form  action="{{  route('admin.data.backup') }}" method="post">
                        @csrf 
                        <div class="dashboard-list-box-static">          
                            <button type="submit" class="button">{{ __('Backup Data') }}</button>
                        </div>   
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
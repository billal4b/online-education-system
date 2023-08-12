@extends('userend.layouts.template')
@section('main-content')    
<div class="dashboard-form">
        <div class="row">
          
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Your Password</h4>
                    <div class="dashboard-list-box-static">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <form method="POST" action="{{ route('user.password.update') }}">
                                        @csrf                     
                                        @include('flash-message')
                                            <div class="form-group row">                    
                                                <div class="col-md-4"> </div>
                                                <div class="col-md-6">                                            
                                                    @foreach ($errors->all() as $error)
                                                        <p class="text-danger">{{ $error }}</p>
                                                    @endforeach  
                                                </div>
                                            </div>    
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                    
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="current_password" required placeholder="Current Password" autocomplete="current-password">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password (at least 6 characters)</label>
                    
                                            <div class="col-md-6">
                                                <input id="new_password" type="password" class="form-control" name="new_password" required placeholder="New Password " autocomplete="current-password">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                    
                                            <div class="col-md-6">
                                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" required placeholder="Confirm Password" autocomplete="current-password">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="mt_btn_yellow">
                                                    Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                       
                                </div>
                            </div>
                        </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>      
@endsection
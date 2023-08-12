@extends('userend.layouts.template')
@section('css')
    <style>
        
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
            <div class="col-lg-2 col-md-12 col-xs-12"></div>    
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Your Profile<a href="{{ route('user.profile') }}" ><span class="button gray">Profile</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <form  action="{{ route('user.profile.update', $edit->id) }}" method="post" id="sectionForm">
                            @csrf
                        <div class="my-profile">
                            <label for="name"><strong>{{ __('Full Name') }}</strong></label>
                            <input id="name" name="name" value="{{ $edit->name }}" type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="mobile"><strong>{{ __('Mobile Number') }}</strong></label>
                            <input id="mobile" name="mobile" value="{{ $edit->mobile }}" type="text" class="form-control @error('mobile') is-invalid @enderror" required autocomplete="mobile number" autofocus>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="email"><strong>{{ __('E-Mail Address') }}</strong></label>
                            <input id="email" name="email" value="{{ $edit->email }}" type="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="address"><strong>{{ __('Address') }}</strong></label>
                            <input id="address" name="address" value="{{ $edit->address }}" type="text" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="gender"><strong>{{ __('Gender') }}</strong></label>
                            <select name="gender" class="form-control">
                                <option value="male" {{ $edit->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $edit->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="blood_group"><strong>{{ __('Blood Group') }}</strong></label>
                            <select name="blood_group" class="form-control">
                                <option value="a+" {{ $edit->blood_group == 'a+' ? 'selected' : '' }}>A + </option>
                                <option value="b+" {{ $edit->blood_group == 'b+' ? 'selected' : '' }}>B + </option>
                                <option value="o+" {{ $edit->blood_group == 'o+' ? 'selected' : '' }}>O + </option>
                                <option value="ab+" {{ $edit->blood_group == 'ab+' ? 'selected' : '' }}>AB + </option>
                                <option value="a-" {{ $edit->blood_group == 'a-' ? 'selected' : '' }}>A - </option>
                                <option value="b-" {{ $edit->blood_group == 'b-' ? 'selected' : '' }}>B - </option>
                                <option value="o-" {{ $edit->blood_group == 'o-' ? 'selected' : '' }}>O - </option>
                                <option value="ab-" {{ $edit->blood_group == 'ab-' ? 'selected' : '' }}>AB - </option>
                            </select>
                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="dob"><strong>{{ __('Date of Birth') }}</strong></label>
                            <input id="dob" name="dob" type="date" value="{{ $edit->dob }}" class="form-control @error('dob') is-invalid @enderror" autocomplete="address" autofocus>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="nid_no"><strong>{{ __('NID') }}</strong></label>
                            <input id="nid_no" name="nid_no" value="{{ $edit->nid_no }}" type="number" class="form-control @error('address') is-invalid @enderror" autocomplete="address" autofocus>
                                @error('nid_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <button type="submit" class="button">{{ __('Update') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>   
            <div class="col-lg-2 col-md-6 col-xs-12"></div>           
        </div>
    </div>      
@endsection

@section('scripts')


@endsection

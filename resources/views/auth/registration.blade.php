@extends('frontend.app')
@section('css')
<style type="text/css">
   .inner-heading h3{ text-align: center;}
   .inner-heading h3:before { background: none;}
   .account-inner {
        display: inline-block;
        width: 100%;
        padding: 40px 30px;
        box-shadow: 0 0 10px #1d1b1b73;
        background: #fff;
        position: relative;
    }
</style>
@endsection
@section('title')
    Registration
@endsection
@section('pages')
    <!-- cart -->
    <section id="account" class="account section-inner body-color">
        <div class="container">
            <div class="row">
                <!--flash Message-->
                <div class="col-md-2"></div>
                <div class="col-md-8 col-xs-12">
                    @include('flash-message')
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3>Create your account here, and continue the course</h3>
                        </div>
                        <form method="POST" action="{{ route('register.create') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="name"><strong>{{ __('Full Name') }}</strong></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender"><strong>{{ __('Gender') }}</strong></label><br>

                                    <label><input type="radio" name="gender" id="gender" value="male" checked> Male </label>
                                    <label><input type="radio" name="gender" id="gender" value="female"> Female</label>
                            </div>
                            <div class="form-group">
                                <label><strong>{{ __('Choose Course') }}</strong></label><br>

                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="select_course[]" id="select_course" value="{{ $k }}"> {{ $v }}</label><br>
                                @endforeach

                                @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile"><strong>{{ __('Mobile Number(Ex: 01717xxxxxx)') }}</strong></label>
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile number">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>{{ __('E-Mail Address') }}</strong></label>
                                <input id="email" type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address"><strong>{{ __('Address') }}</strong></label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="mt_btn_yellow">{{ __('Registration') }}</button>
                            </div>
                        </form>
                            <div class="form-group">
                                <p>Already have an account? <a href="/login"><strong>Login</strong></a></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection

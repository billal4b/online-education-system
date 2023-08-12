@extends('frontend.app')
@section('css')
<style type="text/css">
    .inner-heading h3{ text-align: center;}
   .inner-heading h3:before { background: none;}
   .account-inner {
        display: inline-block;
        width: 100%;
        padding: 40px 30px;
        background: #FFFFFF;
        position: relative;
       padding-top: 100px !important;

   }
   .txt-shadow {
        box-shadow: 0 0 15px 0 rgb(0 0 0 / 10%) !important;
       background:white !important;

    }
   .txt-shadow input{
       height: 50px !important;
   }
   .txt-shadow span{
       top: 8px !important;
       right: 5px !important;
   }
   #account{
       background: white;
   }
</style>
@endsection
@section('title')
    Login
@endsection
@section('pages')
    <!-- cart -->
    <section id="account" class="account section-inner body-color">
        <div class="container">
            <div class="row" style="border-radius: 5px;background-color: #fff;box-shadow: 0 0 4px 0 rgb(0 0 0 / 16%);">
                <!--flash Message-->
{{--                <div class="col-lg-6 col-md-12 col-xs-12" style="background-image: url('{{asset('/images/bg-login.png')}}')"></div>--}}
                <div class="col-lg-6 col-md-6 col-xs-12 hidden-sm hidden-xs" style="padding: 0;padding-right: 120px;">
                    <div style="background-image: url('../public/images/banner/{{!empty($loginBanner)?$loginBanner->image_name:'bg-login.png'}}');background-position-x: right; background-repeat: no-repeat;background-size: contain;height: 88vh"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                      @include('flash-message')
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3 style="font-weight: 600!important;font-size: 2.5rem !important;color: #2f2f2f!important;font-family: Roboto,sans-serif;padding-left: 0;text-align: left;">Login to continue</h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group txt-shadow has-feedback">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus/>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group txt-shadow has-feedback">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required autofocus/>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if (Route::has('password.request'))
                                        <p><a class="lost_password" href="{{ route('password.request') }}">
                                                <span>{{ __('Forgot Password?') }}</span>
                                            </a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control mt_btn_yellow" style="height: 50px;font-size: 20px;">{{ __('Login') }}</button>
                            </div>
                            <div class="form-group">
                                <p style="font-size: 14px;">Don’t have an account? <a href="/registration"><strong>Registration</strong></a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End store -->

@endsection

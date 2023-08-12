@extends('frontend.app')
@section('title')
   Reset Password 
@endsection
@section('pages')
 <section id="account" class="account section-padding section-inner">
        <div class="container">
            <div class="account-inner lost-pswrd">
                 @include('flash-message')
                <p class="lt-pswrd">Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p>
                 <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                         <button type="submit" class="btn mt_btn_yellow">{{ __('Send Password Reset Link') }}</button>
                    </div>    
                </form>
            </div>
        </div>
    </section>
    
@endsection

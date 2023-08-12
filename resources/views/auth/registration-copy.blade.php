@extends('frontend.app')
@section('title')
    Apply Online
@endsection
@section('pages')
    <!-- cart -->
    <section id="account" class="account section-inner">
        <div class="container">
            <div class="row">
                <!--flash Message-->
                <div class="col-md-6 col-xs-12">
                     @include('flash-message')
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3><b>Log In</b></h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><strong>{{ __('Username/E-Mail') }}</strong></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><strong>{{ __('Password') }}</strong></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="mt_btn_yellow">{{ __('Login') }}</button>
                            </div>
                        </form>
                        <p class="lost_password">
                                <a href="{{url('/password/reset')}}">Lost your password?</a>
                            </p>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3><b>Registrantion</b></h3>
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
                                @foreach ($courses as $course)
                                    <label><input type="checkbox" name="select_course[]" id="select_course" value="{{ $course->course_name }}"> {{ $course->course_name }}</label><br>
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
                            <button type="submit" class="mt_btn_yellow"> {{ __('Register') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End store -->

@endsection

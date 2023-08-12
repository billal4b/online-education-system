@extends('frontend.app')
@section('title')
    Lost Password
@endsection
@section('pages')

<section id="account" class="account section-padding section-inner">
     @include('flash-message')
        <div class="container">
            <div class="account-inner lost-pswrd">
                <p class="lt-pswrd">Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
                <form class="" method="">
                    <div class="form-group">
                        <label>Username/Email Address:</label>
                        <input type="text" class="form-control" name="">
                    </div>
                    <div class="form-group">
                        <button class="btn mt_btn_yellow">Login</button>
                    </div>    
                </form>
            </div>
        </div>
    </section>
   

@endsection

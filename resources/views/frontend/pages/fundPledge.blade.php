@extends('frontend.app')
@section('css')
    <style type="text/css">
        .payment {
            text-align: center;
        }
        .inner-heading .payment:before {
            background: none;
        }
        #course_title {
            margin-left: 20px;
        }
        .required { color: red;}
        .middel-text {
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .donor-section-one, .donor-section-two, .donor-section-three {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 15px;
        }

    </style>
@endsection
@section('title')
IQS SOCIAL DEVELOPMENT
@endsection

@section('pages')
    <!--Education Event-->
    <section class="edu-events event_third section-inner">
        <div class="container">
            <div class="row">
                 <!-- section title -->
                 <div class="inner-heading">
                    <h2 class="payment"><b>SOCIAL DEVELOPMENT FUND PLEDGE FORM</b></h2>
                </div>
                 <!--flash Message-->
                @include('flash-message')
                <form method="POST" action="{{ route('fundPledge.form') }}" id="fundPledgeForm">
                    @csrf
                    <div class="row donor-section-one">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="name"><strong>{{ __('Donor Name:') }}  <span class="required">*</span></strong></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="address"><strong>{{ __('Address:') }}  <span class="required">*</span></strong></label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="city"><strong>{{ __('City:') }} </strong></label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="post_code"><strong>{{ __('Post Code:') }}</strong></label>
                                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="contact"><strong>{{ __('Contact No:') }} <span class="required">*</span></strong></label>
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autofocus>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>{{ __('Contact Email:') }}</strong></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="middel-text"><b>Donor Emergency Contact:</b></div>
                    <div class="row donor-section-two">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="ref_name"><strong>{{ __('Name:') }}  <span class="required">*</span></strong></label>
                                <input id="ref_name" type="text" class="form-control @error('ref_name') is-invalid @enderror" name="ref_name" value="{{ old('ref_name') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="relationship"><strong>{{ __('Relationship:') }}</strong></label>
                                <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ old('relationship') }}" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="ref_contact"><strong>{{ __('Contact No:') }} <span class="required">*</span></strong></label>
                                <input id="ref_contact" type="text" class="form-control @error('ref_contact') is-invalid @enderror" name="ref_contact" value="{{ old('ref_contact') }}" required autofocus>
                                @error('ref_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ref_email"><strong>{{ __('Contact Email:') }}</strong></label>
                                <input id="ref_email" type="email" class="form-control @error('ref_email') is-invalid @enderror" name="ref_email" value="{{ old('ref_email') }}" autofocus>
                                @error('ref_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="middel-text">
                        <b>My Pledge:</b>
                        <p>By signing below, I/We are committing to the following pledge to IQS Social Development Fund:</p>
                    </div>
                    <div class="row donor-section-three">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="fund_amount"><strong>{{ __('Amount:') }}  <span class="required">*</span></strong></label>
                                <input id="fund_amount" type="number" class="form-control @error('fund_amount') is-invalid @enderror" name="fund_amount" required>
                                @error('fund_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><strong>{{ __('Pledge from:') }} <span class="required">*</span></strong></label><br>
                                    <label><input type="radio" name="pledge_clause" id="pledge_clause" value="Zakat"> Zakat</label><br>
                                    <label><input type="radio" name="pledge_clause" id="pledge_clause" value="General Sadaqah"> General Sadaqah</label><br>
                                @error('pledge_clause')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label><strong>{{ __('Pledge Time:') }} <span class="required">*</span></strong></label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time1" name="pledge_time" value="I am paying my entire pledge at this time"> I am paying my entire pledge at this time</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time2" name="pledge_time" value="I will pay my pledge amount on monthly basis"> I will pay my pledge amount on monthly basis</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time3" name="pledge_time" value="I will pay my pledge amount on yearly basis"> I will pay my pledge amount on yearly basis</label><br>
                                    <label><input type="radio" onclick="myFunction();" id="pledge_time4" name="pledge_time"> Other, Please mention </label>
                                    <span style="visibility:hidden"><input type="text" id="inputField" name="pledge_time_input" class="form-control" placeholder="Writing here..."></span>

                                    @error('pledge_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issue_date"><strong>{{ __('Date') }}</strong></label>
                                <input type="date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" name="issue_date" value="{{ old('issue_date') }}" autofocus>
                                @error('issue_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <button type="submit" class="mt_btn_yellow"> {{ __('Submit') }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Education Event-->
@endsection


@section('scripts')
<script type="text/javascript">
    function myFunction() {
        if (document.getElementById('pledge_time4').checked) {
            document.getElementById('inputField').style.visibility = 'visible';
        } else {
            document.getElementById('inputField').style.visibility = 'hidden';
        }
    }

</script>
@endsection

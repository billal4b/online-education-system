@extends('frontend.app')
@section('css')
    <style type="text/css">
        .payment {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
        }
        .inner-heading .payment:before {
            background: none;
        }
        #course_title {
            margin-left: 20px;
        }
        .required { color: red;}
    </style>
@endsection
@section('title')
    Payment Details
@endsection

@section('pages')
           
    <!--Education Event-->
    <section class="edu-events event_third section-inner">
        <div class="container">
            <!-- section title -->
            <div class="inner-heading">
                <h2>Choose your payment method</h2>
            </div>
            <div class="row">
                <div class="col-xs-12">                 

                   <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 1 : City Bank (1502 715112 001)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>Account number : 15027 15112 001 </li><br>
                                    <li><i class="fa fa-adjust"></i>Account Name : IQS Consultancy</li><br>
                                    <li><i class="fa fa-adjust"></i>Routing number: 225274361</li><br>
                                    <li><i class="fa fa-map-marker"></i>Mouchak Branch, Dhaka</li>
                                    </ul>
                                <p>City Bank এর মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন।</p>
                            </div>
                               
                            <div class="cvvs_img">
                                <img src="public/images/city_bank.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                    <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 2 : bKask (01711 234831)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>bKash number (Personal) : 01711 234831</li><br>
                                    <li><i class="fa fa-phone"></i>Call iqsbd : +88 01711 234 831</li>  
                                </ul>
                                <p>বিকাশের মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন। </p>
                            </div>

                            <div class="cvvs_img">
                                <img src="public/images/bkash.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                    <div class="event-item">
                        <div class="event-details">
                            <div class="event_infn">
                               <h3 class="mar-bottom-10"><a href="#">Payment Method - 3 : Nagad (01711 234831)</a></h3>
                                <ul class="event-time">
                                    <li><i class="fa fa-clock-o"></i>Nagad number (Personal) : 01711 234831</li><br>
                                    <li><i class="fa fa-phone"></i>Call iqsbd : +88 01711 234 831</li>  
                                </ul>
                                <p>নগদের মাধ্যমে কোর্স ফি পেমেন্ট করতে পারেন। </p>
                            </div>

                            <div class="cvvs_img">
                                <img src="public/images/nagad.jpg" alt="">
                            </div>
                        </div>                             
                    </div>
                </div>  
              
            </div>

            <div class="row">
                 <!-- section title -->
                 <div class="inner-heading">
                    <h2 class="payment"><b>Payment Confirmation Form</b></h2>
                </div>
                 <!--flash Message-->
                @include('flash-message')
                <form method="POST" action="{{ route('paymentinfo.form') }}" id="sectionForm">
                    @csrf
                    <div class="col-md-6 col-xs-12">                           
                        {{-- <div class="form-group">
                            <label for="student_name"><strong>{{ __('Student Name') }} <span class="required">*</span></strong></label>
                            <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name') }}" required autofocus>
                        </div> --}}
                        <div class="form-group">
                            <label for="student_id"><strong>{{ __('Student ID') }}  <span class="required">*</span></strong></label>
                            <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="payment_method"><strong>{{ __('Payment Method') }}  <span class="required">*</span></strong></label>
                            <select id="payment_method" name="payment_method">
                                <option value="bkask">bKask ( 01711 234831 )</option>
                                <option value="nagad">Nagad ( 01711 234831 )</option>
                                <option value="ab-bank">City Bank ( 1502 715112 001 )</option>                                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_amount"><strong>{{ __('Payment Amount') }}  <span class="required">*</span></strong></label>
                            <input id="payment_amount" type="number" class="form-control @error('payment_amount') is-invalid @enderror" name="payment_amount" required>
                            @error('payment_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="transaction_id"><strong>{{ __('Transaction ID/Order ID') }} <span class="required">*</span></strong></label>
                            <input id="transaction_id" type="text" class="form-control @error('transaction_id') is-invalid @enderror" name="transaction_id" value="{{ old('transaction_id') }}" required autofocus>
                            @error('transaction_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>       
                        <div class="form-group">
                            <label for="date_time"><strong>{{ __('Payment Month') }} <span class="required">*</span></strong></label>
                            <input id="date_time" type="date" class="form-control @error('date_time') is-invalid @enderror" name="date_time" value="{{ old('date_time') }}" required autofocus>
                            @error('date_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>              
                    </div>
                    <div class="col-md-6 col-xs-12">
                        

                        <div class="form-group">
                            <label><strong>{{ __('Your Course') }} <span class="required">*</span></strong></label><br>
                            @foreach ($courses as $k => $v)
                                <label><input type="checkbox" name="course_title[]" id="course_title" value="{{ $k }}"> {{ $v }}</label><br>
                            @endforeach

                            @error('course_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contact"><strong>{{ __('Contact No (Ex: 01717xxxxxx)') }}</strong></label>
                             <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" autofocus>
                             @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="batch_id"><strong>{{ __('Batch ID') }}</strong></label>
                            <input id="batch_id" type="text" class="form-control @error('batch_id') is-invalid @enderror" name="batch_id" value="{{ old('batch_id') }}" autofocus>
                        </div> --}}
                            <button type="submit" class="mt_btn_yellow"> {{ __('Submit') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Education Event-->   
    

@endsection


@section('scripts')
<script type="text/javascript">
   (function() {
    const form = document.querySelector('#sectionForm');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }

            checkValidity();
        }
    }

    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }

        return false;
    }

    function checkValidity() {
        const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }

    init();
})();
</script>
@endsection

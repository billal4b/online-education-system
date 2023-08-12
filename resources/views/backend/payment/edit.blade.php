@extends('backend.layouts.template')
@section('main-content')
<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.payment.update', $edit->id) }}" method="post" id="sectionForm">
            @csrf
                <!-- Header text -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    @include('flash-message')
                    <div class="dashboard-list-box">
                        <h4 class="gray">Payment Info Update <a href="{{ route('admin.payment') }}" ><span class="button gray">List</span></a></h4>
                    </div>
                </div>
            <!-- Profile -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="student_id"><strong>{{ __('Student ID') }}</strong></label>
                            <input id="student_id" name="student_id" value="{{ $edit->user_id }}" type="text" class="form-control @error('student_id') is-invalid @enderror" required autofocus>
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                            <label for="payment_method"><strong>{{ __('Payment Method') }}</strong></label>
                                <select name="payment_method">
                                    
                                    <option value="bkask" {{ $edit->payment_method == 'bkask' ? 'selected' : '' }}>bKask</option>
                                    
                                     <option value="nagad" {{ $edit->payment_method == 'nagad' ? 'selected' : '' }}>Nagad</option>
                                     
                                    <option value="ab-bank" {{ $edit->payment_method == 'ab-bank' ? 'selected' : '' }}>Bank</option>                                   
                                    <option value="hand" {{ $edit->payment_method == 'hand' ? 'selected' : '' }}>By Hand</option>                                   
                                </select>                                                      
                            <label for="payment_amount"><strong>{{ __('Payment Amount') }}</strong></label>
                            <input id="payment_amount" name="payment_amount" value="{{ $edit->payment_amount }}" type="number" class="form-control @error('payment_amount') is-invalid @enderror" required autocomplete="payment_amount" autofocus>
                                @error('payment_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                            <label for="transaction_id"><strong>{{ __('Transaction ID/Order ID') }}</strong></label>
                            <input id="transaction_id" name="transaction_id" value="{{ $edit->transaction_id }}" type="text"  class="form-control @error('transaction_id') is-invalid @enderror" required autocomplete="transaction_id" autofocus>
                                @error('transaction_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    

                            <label for="date_time"><strong>{{ __('Payment Date') }}</strong></label>                  
                            <input id="date_time" name="date_time" type="date" value="{{ $edit->date_time }}" class="form-control @error('date_time') is-invalid @enderror" required autocomplete="date_time" autofocus>
                                @error('date_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Change Password -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="dashboard-list-box margin-top-0">
                    <div class="dashboard-list-box-static">
                        <div class="my-profile">
                            <div class="form-group">
                                <label><strong>Select Courses :</strong></label>
                                @php
                                    $courseList = $edit->course_title ;
                                @endphp
                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="course_title[]" id="course_title"
                                        value="{{ $k }}" @if (in_array($k, $courseList)) checked @endif>
                                        {{ $v }}
                                    </label>
                                @endforeach

                                @error('course_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                                                 
                            <label for="contact"><strong>{{ __('Contact No') }}</strong></label>
                            <input id="contact" name="contact" type="text" value="{{ $edit->contact }}" class="form-control @error('contact') is-invalid @enderror" autofocus>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div>
                        <button type="submit" class="button">{{ __('Update') }}</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
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

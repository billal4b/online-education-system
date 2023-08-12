@extends('backend.layouts.template')
@section('main-content')
<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.update', $edit->id) }}" method="post" id="sectionForm">
            @csrf
                <!-- Header text -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Student Information Update <a href="{{ route('admin.user') }}" ><span class="button gray">List</span></a></h4>
                    </div>
                </div>
            <!-- Profile -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
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
                            <label for="password"><strong>{{ __('Password') }}</strong></label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password-confirm" class="col-form-label text-md-right"><strong>{{ __('Confirm Password') }}</strong></label>
                            <input id="password-confirm"  name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
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
                                $courseList = $edit->select_course ;
                               // print_r($courseList); exit;
                                @endphp
                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="select_course[]" id="select_course"
                                        value="{{ $k }}" @if (in_array($k, $courseList)) checked @endif>
                                        {{ $v }}
                                    </label>
                                @endforeach

                                @error('select_course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <label for="is_kids"><strong>{{ __('Adult/Kids') }}</strong></label>
                            <select name="is_kids" class="form-control">
                                <option value="0" {{ $edit->is_kids == 0 ? 'selected' : '' }}>Adult</option>
                                <option value="1" {{ $edit->is_kids == 1 ? 'selected' : '' }}>Kids</option>
                            </select>
                                @error('is_kids')
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
                            <label for="status"><strong>{{ __('Status') }}</strong></label>
                            <select name="status" class="form-control">
                                <option value="active" {{ $edit->status == 'active' ? 'selected' : '' }}>Approved</option>
                                <option value="inactive" {{ $edit->status == 'inactive' ? 'selected' : '' }}>Pending</option>
                            </select>
                                @error('status')
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
    //document.getElementById('course_title').value = '{{ $edit->course_title }}';

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

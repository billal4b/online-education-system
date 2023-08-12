@extends('frontend.app')
@section('css')
<style type="text/css">
   .required { color: red;}
</style>
@endsection
@section('title')
    Admission Form
@endsection
@section('pages')
    <!-- cart -->
    <section id="account" class="account section-inner body-color">
        <div class="container">
            <div class="row">
                <!--flash Message-->
                @include('flash-message')

                <div class="col-md-6 col-xs-12">
                    <div class="account-inner">
                        <!-- section title -->
                        <div class="inner-heading">
                            <h3>Admission Form</h3>
                        </div>
                        <form method="POST" action="{{ route('admission.create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Student Name') }} <strong class="required">*</strong></label>
                                <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name') }}" required autocomplete="student_name" autofocus>

                                @error('student_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edu_qua">{{ __('Education Qualifications') }}  <strong class="required">*</strong></label>
                                <input id="edu_qua" type="text" class="form-control @error('edu_qua') is-invalid @enderror" name="edu_qua" value="{{ old('edu_qua') }}" autocomplete="edu_qua" required autofocus>

                                @error('edu_qua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="institute_name">{{ __('Institute Name') }}  <strong class="required">*</strong></label>
                                <input id="institute_name" type="text" class="form-control @error('institute_name') is-invalid @enderror" name="institute_name" value="{{ old('institute_name') }}" required autocomplete="institute_name" autofocus>

                                @error('institute_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}  <strong class="required">*</strong></label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact">{{ __('Contact Number (Ex: 01717xxxxxx)') }}  <strong class="required">*</strong></label>
                                <input id="contact" type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact number">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="select_course">{{ __('Select Course :') }}  <strong class="required">*</strong></label><br>
                                    @foreach ($admissionForm as $k=>$v)
                                        <label><input type="checkbox" name="select_course[]" id="select_course" value="{{ $k }}"> {{ $v }}</label><br>
                                    @endforeach

                                @error('select_course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">{{ __('Gender') }}</label><br>
                                    <label><input type="radio" name="gender" id="gender" value="male" checked> Male </label>
                                    <label><input type="radio" name="gender" id="gender" value="female"> Female</label>
                            </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="account-inner">
                        <!-- Avatar -->
                        <div class="form-group">
                            <div class="edit-profile-photo">
                                <img src="public/images/user-avatar.jpg" alt="" id="blah" name="student_image">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Student Photo</span>
                                        <input id="student_image" name="student_image" type="file" class="upload @error('student_image') is-invalid @enderror" autocomplete="student_image" autofocus>
                                    </div>
                                </div>
                            </div>
                            @error('student_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nid">{{ __('NID/Birth Registration Number') }}</label>
                            <input id="nid" type="number" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" autofocus>

                            @error('nid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dob">{{ __('Date of Birth') }}</label>
                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autofocus>

                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="father_name">{{ __('Father Name') }}</label>
                            <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" autofocus>

                            @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mother_name">{{ __('Mother Name') }}</label>
                            <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" autofocus>

                            @error('mother_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="guardian_name">{{ __('Guardian Name') }}</label>
                                <input id="guardian_name" type="text" class="form-control @error('guardian_name') is-invalid @enderror" name="guardian_name" value="{{ old('guardian_name') }}" autofocus>

                                @error('guardian_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="relation">{{ __('Relation') }}</label>
                                <input id="relation" type="text" class="form-control @error('relation') is-invalid @enderror" name="relation" value="{{ old('relation') }}" autofocus>

                                @error('relation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact_father">{{ __('Contact Number (Father)') }}</label>
                                <input id="contact_father" type="tel" class="form-control @error('contact_father') is-invalid @enderror" name="contact_father" value="{{ old('contact_father') }}" autocomplete="contact number">

                                @error('contact_father')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_mother">{{ __('Contact Number (Mother)') }}</label>
                                <input id="contact_mother" type="tel" class="form-control @error('contact_mother') is-invalid @enderror" name="contact_mother" value="{{ old('contact_mother') }}" autocomplete="contact number">

                                @error('contact_mother')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date_time">{{ __('Apply Date') }}</label>
                                <input id="date_time" type="date" class="form-control @error('date_time') is-invalid @enderror" name="date_time" value="{{ old('date_time') }}" autofocus>

                                @error('date_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="mt_btn_yellow"> {{ __('Submit') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End store -->

@endsection

@section('scripts')
<script>
    $(function() {
        $("#student_image").change(function() {
            console.log('image changed');
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection

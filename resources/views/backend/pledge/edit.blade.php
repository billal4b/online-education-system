@extends('backend.layouts.template')
@section('main-content')
<div class="dashboard-form">
        <div class="row">
            <form  action="{{ route('admin.pledge.update', $edit->id) }}" method="post" id="sectionForm">
            @csrf
                <!-- Header text -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Pledge User Update <a href="{{ route('admin.pledge.user') }}" ><span class="button gray">List</span></a></h4>
                    </div>
                </div>
            <!-- Profile -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="dashboard-list-box">
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <label for="name"><strong>{{ __('Name') }}</strong></label>
                            <input id="name" name="name" value="{{ $edit->name }}" type="text" class="form-control @error('name') is-invalid @enderror" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="address"><strong>{{ __('Address') }}</strong></label>
                            <input id="address" name="address" value="{{ $edit->address }}" type="text" class="form-control @error('address') is-invalid @enderror" required autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="city"><strong>{{ __('City') }}</strong></label>
                            <input id="city" name="city" value="{{ $edit->city }}" type="text" class="form-control @error('city') is-invalid @enderror" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="post_code"><strong>{{ __('Post Code') }}</strong></label>
                            <input id="post_code" name="post_code" value="{{ $edit->post_code }}" type="text" class="form-control @error('contact') is-invalid @enderror" autofocus>
                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="contact"><strong>{{ __('Contact') }}</strong></label>
                            <input id="contact" name="contact" value="{{ $edit->contact }}" type="contact" class="form-control @error('contact') is-invalid @enderror">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="email"><strong>{{ __('E-Mail') }}</strong></label>
                            <input id="email" name="email" value="{{ $edit->email }}" type="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p><b>Donor Emergency Contact:</b></p>
                            <label for="ref_name"><strong>{{ __('Name') }}</strong></label>
                            <input id="ref_name" name="ref_name" value="{{ $edit->ref_name }}" type="text" class="form-control @error('ref_name') is-invalid @enderror" autofocus>
                                @error('ref_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="ref_contact"><strong>{{ __('Contact') }}</strong></label>
                            <input id="ref_contact" name="ref_contact" value="{{ $edit->ref_contact }}" type="ref_contact" class="form-control @error('ref_contact') is-invalid @enderror">
                                @error('ref_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="relationship"><strong>{{ __('Relationship') }}</strong></label>
                            <input id="relationship" name="relationship" value="{{ $edit->relationship }}" type="relationship" class="form-control @error('relationship') is-invalid @enderror">
                                @error('relationship')
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
                            <p><b>My Pledge:</b></p>
                            <label for="fund_amount"><strong>{{ __('Amount') }}</strong></label>
                            <input id="fund_amount" name="fund_amount" value="{{ $edit->fund_amount }}" type="fund_amount" class="form-control @error('fund_amount') is-invalid @enderror">
                                @error('fund_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="pledge_clause"><strong>{{ __('Pledge from') }}</strong></label>
                            <select name="pledge_clause" class="form-control">
                                <option value="Zakat" {{ $edit->pledge_clause == 'Zakat' ? 'selected' : '' }}>Zakat</option>
                                <option value="General Sadaqah" {{ $edit->pledge_clause == 'General Sadaqah' ? 'selected' : '' }}>General Sadaqah</option>
                            </select>
                                @error('pledge_clause')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="pledge_time"><strong>{{ __('Pledge Time') }}</strong></label>
                            <select name="pledge_time" class="form-control">
                                <option value="I am paying my entire pledge at this time" {{ $edit->pledge_time == 'I am paying my entire pledge at this time' ? 'selected' : '' }}>I am paying my entire pledge at this time</option>
                                <option value="I will pay my pledge amount on monthly basis" {{ $edit->pledge_time == 'I will pay my pledge amount on monthly basis' ? 'selected' : '' }}>I will pay my pledge amount on monthly basis</option>
                                <option value="I will pay my pledge amount on yearly basis" {{ $edit->pledge_time == 'I will pay my pledge amount on yearly basis' ? 'selected' : '' }}>I will pay my pledge amount on yearly basis</option>
                            </select>
                                @error('pledge_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            <label for="issue_date"><strong>{{ __('Date') }}</strong></label>
                            <input id="issue_date" name="issue_date" value="{{ $edit->issue_date }}" type="date" class="form-control @error('issue_date') is-invalid @enderror" autofocus>
                                @error('issue_date')
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

</script>
@endsection

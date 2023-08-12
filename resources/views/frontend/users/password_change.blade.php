@extends('frontend.app')
@section('css')
<style>
</style>
@endsection
@section('title') Change Your Password @endsection
@section('pages')
<section id="mt_contact" class="contact-main section-inner body-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.change.password') }}">
                    @csrf
                    @include('flash-message')
                        <div class="form-group row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-8">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="current_password" required placeholder="Current Password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password (at least 6 characters)</label>
                        <div class="col-md-8">
                            <input id="new_password" type="password" class="form-control" name="new_password" required placeholder="New Password " autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                        <div class="col-md-8">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" required placeholder="Confirm Password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="mt_btn_yellow">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>

</script>
@endsection

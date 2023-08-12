@extends('backend.layouts.template')
@section('css')
    <style></style>
@endsection
@section('main-content')

    <div class="dashboard-form">
        <div class="row">
            @include('flash-message')
            <form action="{{ route('admin.arabic-dictionary.update', $edit->id) }}" method="post">
                @csrf
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Update Word <a href="{{ url('/admin/arabic-dictionary') }}"><span
                                        class="button gray">Back</span></a></h4>
                        <div class="dashboard-list-box-static">
                            <!-- Details -->
                            <div class="my-profile">
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="bengali_word"><strong>{{ __('Bengali Word') }}</strong></label>
                                        <input id="bengali_word" name="bengali_word" type="text"
                                               value="{{ $edit->bengali_word }}"
                                               class="form-control @error('bengali_word') is-invalid @enderror" required
                                               autocomplete="bengali_word" autofocus>
                                        @error('bengali_word')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="arabic_word"><strong>{{ __('Arabic Word') }}</strong></label>
                                        <input id="arabic_word" name="arabic_word" type="text"
                                               value="{{ $edit->arabic_word }}"
                                               class="form-control @error('arabic_word') is-invalid @enderror" required
                                               autocomplete="arabic_word" autofocus>
                                        @error('arabic_word')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="english_word"><strong>{{ __('English Word') }}</strong></label>
                                        <input id="english_word" name="english_word" type="text"
                                               value="{{ $edit->english_word }}"
                                               class="form-control @error('english_word') is-invalid @enderror"
                                               autocomplete="english_word" autofocus>
                                        @error('english_word')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="subject"><strong>{{ __('Lesson No') }}</strong></label>
                                        <input id="lesson_no" name="lesson_no" type="hidden"
                                               value="{{ $edit->lesson_no }}" class="form-control">
                                        <select name="subject" id="subject" style="height: 35px" class="form-control">
                                            <option>{{ $edit->lesson_no }}</option>
                                        </select>
                                        @error('lesson_no')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="total_mentioned"><strong>{{ __('Total Mentioned') }}</strong></label>
                                        <input id="total_mentioned" name="total_mentioned" type="text"
                                               value="{{ $edit->total_mentioned }}"
                                               class="form-control @error('total_mentioned') is-invalid @enderror"
                                               autocomplete="total_mentioned" autofocus>
                                        @error('total_mentioned')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label for="lesson_name"><strong>&nbsp;</strong></label>
                                        <button type="submit" class="button">{{ __('Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('public/select2/select2.js')}}"></script>
    <script>
        $('#subject').select2({
            theme: "bootstrap",
            tags: true,
            allowClear: true,
            placeholder: 'Type Subject',
            minimumInputLength: 0,
            ajax: {
                url: '{{route('dictionary.quarnic.subject.search')}}',
                dataType: 'json'
            }
        }).on('change', function (e) {
            let sub = $(this).find(":selected").text();
            $('#lesson_no').val(sub)
        })
    </script>
@endsection

@extends('backend.layouts.template')
@section('css')
<style>
#course_title {
    margin-left: 20px;
}
#gender-margin {
    margin-left: 20px;
}

</style>
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.todayclass.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Today Class <a href="{{ url()->previous() }}"><span class="button gray">Back</span></a></h4>
                    <div class="dashboard-list-box-static">

                        <!-- Details -->
                        <div class="my-profile">
                            @error('video_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="video_title"><strong>{{ __('Video Title') }}</strong> </label>
                            <input id="video_title" name="video_title" type="text" class="form-control @error('video_title') is-invalid @enderror" required autocomplete="title" autofocus>


                            @error('video_url_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="video_url_id"><strong>{{ __('YouTube Video ID (p6vJmtH-G5Y)') }}</strong></label>
                            <input id="video_url_id" name="video_url_id" type="text" class="form-control @error('video_url_id') is-invalid @enderror" required autocomplete="video" autofocus>

                            <div class="form-group">
                                 @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label><strong>Select Courses :</strong></label>
                                @foreach ($courses as $k=>$v)
                                    <label><input type="checkbox" name="course_id" id="course_id" value="{{ $k }}" onclick="onlyOne(this)"> {{ $v }}</label>
                                @endforeach
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="gender"><strong>{{ __('Gender :') }}</strong></label>
                                <div id="gender-margin">
                                    <input type="radio" name="gender" id="gender" value="male"> Male &nbsp;
                                    <input type="radio" name="gender" id="gender" value="female"> Female
                                </div>
                            </div>

                            <label for="order"><strong>{{ __('Order') }}</strong> <span>(Optional)</span></label>
                            <input id="order" name="order" type="number" class="form-control @error('order') is-invalid @enderror"  autocomplete="order" autofocus>
                                @error('order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="is_active"><strong>{{ __('Publication Status') }}<strong></label>
                            <select id="type" name="is_active" class="form-control">
                                <option value="1">Publish </option>
                                <option value="0">Unpublish </option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="button">{{ __('Save') }}</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('course_title')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>
@endsection

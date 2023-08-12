@extends('backend.layouts.template')
@section('css')
<style>
    #gender-margin {margin-left: 20px; }
</style>
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.todayclass.update', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            @include('flash-message')
            <div class="dashboard-list-box">
                <h4 class="gray">Update Today Class <a href="{{ route('admin.todayclass') }}" ><span class="button gray">Back</span></a></h4>
                <div class="dashboard-list-box-static">
                    <!-- Details -->
                    <div class="my-profile">

                        <label for="video_title"><strong>{{ __('Video Title') }}</strong></label>
                        <input id="video_title" name="video_title" type="text" value="{{ $edit->video_title }}" class="form-control @error('video_title') is-invalid @enderror" required autocomplete="video_title" autofocus>
                            @error('video_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="video_url_id"><strong>{{ __('YouTube Video ID') }}</strong></label>
                        <input id="video_url_id" name="video_url_id" type="text" value="{{ $edit->video_url_id }}" class="form-control @error('video_url_id') is-invalid @enderror" autocomplete="video_url_id" autofocus>

                        @error('video_url_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label><strong>Select Courses :</strong></label>
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $k=>$v )
                                    <option value="{{ $k }}">{{ $v }} </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="gender"><strong>{{ __('Gender :') }}</strong></label>
                            <div id="gender-margin">
                                <input type="radio" name="gender" id="gender" value="male" {{ $edit->gender == 'male' ? 'checked' : ''}}> Male &nbsp;
                                <input type="radio" name="gender" id="gender" value="female" {{ $edit->gender == 'female' ? 'checked' : ''}}> Female
                            </div>
                        </div>
                        <label for="order"><strong>{{ __('Order') }}</strong> <span>(Optional)</span></label>
                        <input id="order" name="order" type="number" value="{{ $edit->order }}" class="form-control @error('order') is-invalid @enderror"  autocomplete="order" autofocus>
                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="is_active"><strong>{{ __('Publication Status') }}</strong></label>
                        <select id="type" name="is_active" class="form-control">
                            <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Unpublish</option>
                        </select>
                    </div>
                    <button type="submit" class="button">{{ __('Update') }}</button>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
document.getElementById('course_title').value = '{{ $edit->course_title }}';
</script>
@endsection

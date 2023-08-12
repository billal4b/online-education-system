@extends('backend.layouts.template')
@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Image List <a href="{{ route('admin.image.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Title</th>      
                        <th>Type</th> 
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                    <tr>
                        <td>{!! $image->title !!}</td>
                        <td>{!! $image->image_type !!}</td>
                        <td><a href="/public/images/banner/{!! $image->image_thumb !!}">
                                <img src="/public/images/banner/thumb/{!! $image->image_thumb !!}">
                            </a>
                        </td>
                        <td><input type="checkbox" data-id="{{ $image->id }}" name="is_active" class="js-switch" {{ $image->is_active == 1 ? 'checked' : '' }} data-toggle="toggle"></td>
                        <td>                         
                            <a href="{{ route('admin.image.delete', $image->id) }}" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
                        </td>   
                    </tr>                     
                    @endforeach    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">

 $(document).ready(function(){
    $('.js-switch').change(function () {
        let is_active = $(this).prop('checked') === true ? 1 : 0;
        let imageId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('admin.image.change.status') }}',
            data: {'is_active': is_active, 'id': imageId},
            success: function (data) {
                console.log(data.success);
            }
        });
    });
});
</script>
@endsection
@extends('backend.layouts.template')
@section('css')
<link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
<style>
    table.basic-table td {
        padding: 10px;
    }
    tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
</style>
@endsection
@section('main-content')
<div class="row">
    <form action="{{route('admin.media')}}" method="get" autocomplete="off">
        <div class="col-md-4" style="margin-left:20px;padding-left:0;padding-right: 0">
            <select name="course_id" id="course_id">
                <option value="" selected>Select Course</option>
                @foreach($courses as $k=>$v)
                    @if(@$courseId == $k)
                        <option value="{{$k}}" selected>{{$v}}</option>
                    @else
                        <option value="{{$k}}">{{$v}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-4" style="margin-left:20px;padding-left:0;padding-right:0;">
            <input type="hidden" name="title_text" id="title_text" value="{{@$titleText}}">
            <select name="title" id="titleSelection">
                @if(@$titleKey != null)
                    <option value="{{@$titleKey}}" class="form-control" selected>{{@$titleText}}</option>
                @endif
            </select>
        </div>
        <div class="col-md-3" style="margin-left:20px;padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
      {{-- <span style="float: center;">
          <select name="course_title" id="course_title" class="form-control">
             <option value="">Select Course</option>
              @foreach($courses as $c )
                  <option value="{{$c->course_title}}">
                      {{ $c->course_title }} </option>
              @endforeach
          </select>
      </span>
      <input type="hidden" name="hidden_course" id="hidden_course" /> --}}
      @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Media List
              <a href="{{ route('admin.media.create') }}">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      @php $i=1; @endphp

                      @foreach ($data as $media)

                      <tr>
                          <td>{!! $i++!!}</td>
                          <td>{!! $media->title !!}</td>
                          <td>{!! $media->courses->course_name !!}</td>
                          <td>{!! $media->order !!}</td>
                          <td><span class="{{ $media->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $media->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>

                          <td>
                            <a href="{{ route('admin.media.edit', $media->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>

                            <a href="{{ route('admin.media.delete', $media->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          </td>
                      </tr>
                      @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {!! $data->links() !!}
    </div>
</div>
@endsection
@section('scripts')<script src="{{asset('public/select2/select2.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#titleSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Title",
            ajax: {
                url: '{{route('admin.media.title.search')}}',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
        $('#titleSelection').change(function () {
            $('#title_text').val($('#titleSelection option:selected').text())
        })
    });

    // $(document).ready(function () {
    //  // load_data();
    //   function load_data(query='') {
    //     $.ajax({
    //       url:"{{ route('admin.media.search') }}",
    //       method: "POST",
    //       data:{
    //         "_token": "{{ csrf_token() }}",
    //         query:query
    //       },
    //       success:function(data) {
    //          //console.log(data);
    //         $('tbody').html(data);

    //       }
    //     })
    //   }

    //   $('#course_title').change(function(){
    //     $('#hidden_course').val($('#course_title').val());
    //     //console.log(this.value);
    //     var query = $('#hidden_course').val();
    //     load_data(query);
    //   });

    // });
</script>
@endsection

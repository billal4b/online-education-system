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
    <form action="{{route('admin.todayclass')}}" method="get" autocomplete="off">
        <div class="col-md-3" style="padding-right: 0">
            <select name="gender" id="gender">
                <option value="" selected>Select Gender</option>
                @foreach(GENDER_TYPE as $k=>$v)
                    @if(@$genderId == $v)
                        <option value="{{$v}}" selected>{{$v}}</option>
                    @else
                        <option value="{{$v}}">{{$v}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-3" style="padding-left:0;padding-right: 0">
            <input type="hidden" name="title_text" id="title_text" value="{{@$titleText}}">
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
        <div class="col-md-3" style="padding-left:0;padding-right:0;">
            <select name="video_title" id="titleSelection">
                @if(@$titleKey != null)
                    <option value="{{@$titleKey}}" class="form-control" selected>{{@$titleText}}</option>
                @endif
            </select>
        </div>
        <div class="col-md-3" style="padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
       @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Today Class video List
              <a href="{{ route('admin.todayclass.create') }}">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Video Title</th>
                        <th>Course</th>
                        <th>Gender</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $todayClass)
                      <tr>
                          <td>{!! $todayClass->video_title !!}</td>
                          <td>{!! $todayClass->courses->course_name !!}</td>
                          <td>{!! $todayClass->gender !!}</td>
                          <td><span class="{{ $todayClass->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $todayClass->is_active == 1 ? 'Publish' : 'Unpublish' !!}</span></td>
                          <td>
                            <a href="{{ route('admin.todayclass.edit', $todayClass->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.todayclass.delete', $todayClass->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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

@section('scripts')
<script src="{{asset('public/select2/select2.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#titleSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Video Title",
            ajax: {
                url: '{{route('admin.todayclass.title.search')}}',
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
    //       url:"{{ route('admin.todayclass.search') }}",
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

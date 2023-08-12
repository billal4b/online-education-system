@extends('backend.layouts.template')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
        span strong {
            color: #3c763d;
        }
   </style>
@endsection
@section('main-content')
<div class="row">
    <form action="{{route('admin.user')}}" method="get" autocomplete="off">
        <div class="col-md-2" style="padding-right: 0">
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
            <input type="hidden" name="name_text" id="name_text" value="{{@$nameText}}">
            <select name="select_course" id="select_course">
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
            <select name="name" id="nameSelection">
                @if(@$nameKey != null)
                    <option value="{{@$nameKey}}" class="form-control" selected>{{@$nameText}}</option>
                @endif
            </select>
        </div>
        <div class="col-md-3" style="padding-left:0;padding-right: 0">
            <input type="text" class="form-control" name="daterange" id="dateRange" value="{{@$dateRange}}"
                   placeholder="Select Date Range">
        </div>
        <div class="col-md-1" style="padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
         @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Registered User List</h4>

            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>S.ID</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Category</th>
                        <th>Online</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $user)
                    <tr>
                        <td><a href="{{ route('admin.edit', $user->id) }}"><i class="sl sl-icon-pencil"></i> {{$user->name}}</a></td>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if (!empty($user->select_course))
                                @foreach($user->select_course as $v)
                                    @isset($courses[$v])
                                   <li> {{ $courses[$v] }} </li>
                                    @endisset
                                @endforeach
                            @endif
                        </td>
                        <td>{!! $user->is_kids == 1 ? 'Kides' : 'Adult' !!}</td>
                        <td>
                            @if($user->isOnline())
                                <span class="paid t-box">Online</span>
                            @else
                                <span class="Pending t-box">Offline</span>
                            @endif
                        </td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->updated_at->format('d-m-Y')}}</td>
                        <td><span class="{{ $user->status == 'active' ? 'paid' : 'cancel' }} t-box">
                            {!! $user->status == 'inactive' ? 'Pending' : 'Approved' !!}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.user.delete', $user->id) }}" onclick="return confirm('Are you sure to Delete?')" class="button">Delete</a>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('public/select2/select2.js')}}"></script>
<script>
    $(document).ready(function () {
        function clearDefaultDateRange() {
            setTimeout(function () {
                $('#dateRange').val('')
            }, 100)
        }

        @if(empty($dateRange))
        clearDefaultDateRange()
        @endif
        $('#nameSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Name",
            ajax: {
                url: '{{route('admin.user.name.search')}}',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
        $('#nameSelection').change(function () {
            $('#name_text').val($('#nameSelection option:selected').text())
        })
        $('#dateRange').daterangepicker({
            //autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY',
                separator: ' to '
            },
            maxSpan: {
                "days": 30
            },
        });
        $(document).on('click', '.cancelBtn', function (ev, picker) {
            $('#dateRange').val('');
        });
    });
</script>
@endsection

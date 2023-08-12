@extends('backend.layouts.template')
@section('css')
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
   </style>
@endsection
@section('main-content')
<div class="row">
   
    <div class="col-lg-12 col-md-12 col-xs-12">
         @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Admitted User List</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>address</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admittedUsers as $admittedUser)
                    <tr>
                        <td>{{$admittedUser->student_name}}</td>
                        <td>
                            @if (!empty($admittedUser->select_course))
                                @foreach($admittedUser->select_course as $v)
                                    @isset($courses[$v])
                                   <li> {{ $courses[$v] }} </li>
                                    @endisset
                                @endforeach
                            @endif
                        </td>
                        <td>{{$admittedUser->email}}</td>
                        <td>{{$admittedUser->contact}}</td>
                        <td><a href="/public/images/admission/{{ $admittedUser->student_image }}" target="_blank">
                                <img src="/public/images/admission/thumb/{{ $admittedUser->student_image }}" width="50" height="50">
                            </a>
                        </td>
                        <td>{{$admittedUser->date_time}}</td>
                        <td>{{$admittedUser->address}}</td>
                        <td>
                            <a href="{{ route('admin.admitted.show', $admittedUser->id) }}" class="button">View</a>
                            <a onclick="return confirm('Are you sure to Delete?')" href="{{ route('admin.admitted.delete', $admittedUser->id) }}" class="button">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {!! $admittedUsers->links() !!}
    </div>
</div>
@endsection

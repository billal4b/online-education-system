@extends('backend.layouts.template')
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Course Details List <a href="{{ route('admin.course.details.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Details EN</th>  
                        <th>Details BD</th>                  
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>                        
                        <td>{!! $course->course_name !!}</td>
                        <td>{!! $course->course_details !!}</td>
                        <td>{!! $course->course_details_bd !!}</td>
                        <td><span class="{!! $course->is_active == 1 ? 'paid' : 'cancel' !!} t-box">{!! $course->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                        <td>
                            <a href="{{ route('admin.course.details.edit', $course->id) }}" class="button gray"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.course.details.delete', $course->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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
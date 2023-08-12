@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="{{route('admin.ebook') }}" ><span class="button gray">List</span></a> </h4>
            <div class="table-box">
                <table class="basic-table booking-table">

                    <tbody>
                        <tr>
                            <td><b>Published Date</b></td>
                            <td>{!! $show->publish_time !!}</td>
                        </tr>
                        <tr>
                            <td><b>Course Name</b></td>
                            <td>{!! @COURSE_NAME[$show->course_id] !!}</td>
                        </tr>
                        <tr>
                            <td><b>Subject Type</b></td>
                            <td>{!! @SUBJECT_TYPE[$show->subject_type] !!}</td>
                        </tr>
                        <tr>
                            <td><b>Topic</b></td>
                            <td>{!! $show->topic !!}</td>
                        </tr>
                        <tr>
                            <td><b>Content</b></td>
                            <td>{!! $show->content !!}</td>
                        </tr>
                        <tr>
                            <td><b>Document File</b></td>
                            @if ($show->document !=null)
                                <td><a href="/public/ebook/{{ $show->document }}" target="_blank">{{ $show->document }}</a></td>
                            @else
                                <td>No Document</td>
                            @endif

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

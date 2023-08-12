@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Details<a href="{{ route('admin.admitted.user') }}" ><span class="button gray">List</span></a> </h4>
            <div class="table-box">
                <table class="basic-table booking-table">

                    <tbody>

                        <tr>
                            <td><b>Student Name</b></td>
                            <td>{!! $show->student_name !!}</td>
                        </tr>
                        <tr>
                            <td><b>EQ</b></td>
                            <td>{!! $show->edu_qua !!}</td>
                        </tr>
                        <tr>
                            <td><b>Institute Name</b></td>
                            <td>{!! $show->institute_name !!}</td>
                        </tr>
                        <tr>
                            <td><b>DOB</b></td>
                            <td>{!! $show->dob !!}</td>
                        </tr>
                        <tr>
                            <td><b>Gender</b></td>
                            <td>{!! $show->gender !!}</td>
                        </tr>
                        <tr>
                            <td><b>Course</b></td>
                            <td>
                                @if (!empty($show->select_course))
                                @foreach($show->select_course as $v)
                                    @isset($courses[$v])
                                   <li> {{ $courses[$v] }} </li>
                                    @endisset
                                @endforeach
                            @endif

                            </td>
                        </tr>
                        <tr>
                            <td><b>Guardian</b></td>
                            <td>{!! $show->guardian_name !!}</td>
                        </tr>

                        <tr>
                            <td><b>Relation</b></td>
                            <td>{!! $show->relation !!}</td>
                        </tr>
                        <tr>
                            <td><b>E-mail</b></td>
                            <td>{!! $show->email !!}</td>
                        </tr>
                        <tr>
                            <td><b>Contact</b></td>
                            <td>{!! $show->contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>Father Contact</b></td>
                            <td>{!! $show->father_contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>Mother Contact</b></td>
                            <td>{!! $show->mother_contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>address</b></td>
                            <td>{!! $show->address !!}</td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td>{!! $show->date_time !!}</td>
                        </tr>



            </div>
        </div>
    </div>
</div>
@endsection

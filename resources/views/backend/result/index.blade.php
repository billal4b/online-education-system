@extends('backend.layouts.template')
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
       @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Result List
              <a href="{{ route('admin.result.create') }}">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Class/Course Name</th>
                        <th>Exam Name</th>
                        <th>Subject Name</th>
                        <th>PDF File</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                      @foreach ($data as $result)
                      <tr>
                          <td>{!! $result->course_title !!}</td>
                          <td>{!! $result->exam_name !!}</td>
                          <td>{!! $result->subject_name !!}</td>
                          <td>
                            <a href="/public/result/{!! $result->pdf_file !!}" target="_blank">
                                <img src="/public/pdf/pdf.png" width="50px" height="50px">
                            </a>
                          </td> 
                          <td>
                            <a href="{{ route('admin.result.edit', $result->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>

                            <a href="{{ route('admin.result.delete', $result->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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

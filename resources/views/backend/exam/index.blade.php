@extends('backend.layouts.template')
@section('main-content')
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
      @include('flash-message')
      <div class="dashboard-list-box">
          <h4 class="gray">Exam List
            <a href="{{ route('admin.question.create') }}">
            <span class="button gray">Add</span></a>
          </h4>
          <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>St. Name</th>
                        <th>Ex. Name</th>
                        <th>Course</th>
                        <th>Marks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach ($data as $exam)
                      <tr>
                          <td>{!! $exam->user_name !!}</td>
                          <td>{!! $exam->exam_title !!}</td>
                          <td>{!! $exam->course_title !!}</td>
                          <td>{!! $exam->marks !!}</td>
                          <td><span class="{{ $exam->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $exam->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                          <td>
                            <a href="{{ route('admin.exam.edit', $exam->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.exam.delete', $exam->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
<script>
</script>
@endsection


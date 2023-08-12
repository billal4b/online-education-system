@extends('backend.layouts.template')
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
       @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">eBook List
              <a href="{{ route('admin.ebook.create') }}">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                      @foreach ($data as $ebook)
                      <tr>
                          <td>{!! $ebook->course_title !!}</td>
                          <td>{!! $ebook->subject !!}</td>
                           <td>{!! $ebook->subject_code !!}</td>
                          <td>{!! Str::limit($ebook->content, 100)  !!}</td>                  
                          <td><span class="{{ $ebook->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $ebook->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                          <td>
                            <a href="{{ route('admin.ebook.show', $ebook->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Show"><i class="sl sl-icon-eye"></i></a>
                            <a href="{{ route('admin.ebook.edit', $ebook->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.ebook.delete', $ebook->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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

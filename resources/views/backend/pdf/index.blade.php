@extends('backend.layouts.template')
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">File List <a href="{{ route('admin.pdf.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Course</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach ($medias as $media)
                      <tr>
                          <td>{!! $media->title !!}</td>
                          <td>{!! $media->courses->course_name !!}</td>
                          <td>
                            <a href="/public/pdf/{!! $media->pdf_file !!}" target="_blank">
                                <img src="/public/pdf/pdf.png" width="50px" height="50px">
                            </a>
                          </td>
                          <td><span class="{{ $media->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $media->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                          <td>
                            <a href="{{ route('admin.pdf.show', $media->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Show"><i class="sl sl-icon-eye"></i></a>
                            <a href="{{ route('admin.pdf.edit', $media->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.pdf.delete', $media->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          </td>

                      </tr>
                      @endforeach
                </tbody>
            </table>

            </div>
        </div>
        {!! $medias->links() !!}
    </div>
</div>
@endsection



@extends('backend.layouts.template')
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">All Section <a href="{{ route('admin.section.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th> 
                        <th>Section Title</th>                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($sections as $section)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$section->section_name}}</td>
                        <td><span class="{{ $section->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $section->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                        <td>
                            <a href="{{ route('admin.section.edit', $section->id) }}" class="button gray"><i class="sl sl-icon-pencil"></i></a>
                            <a href="{{ route('admin.section.delete', $section->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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
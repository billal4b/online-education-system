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
            <h4 class="gray">Notice List <a href="{{ route('admin.notice.create') }}" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Title</th>      
                            <th>Content</th>      
                            <th>Publish</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notices as $notice)                    
                        <tr>
                            <td><a href="{{ route('admin.notice.edit', $notice->id) }}">{!! $notice->title !!}</a></td>
                            <td>{!! Str::limit($notice->content, 100)  !!}</td>
                            <td>{!! $notice->publish_at  !!}</td>
                            <td><span class="{{ $notice->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $notice->is_active == 1 ? 'Publish' : 'Unpublish' !!}</span></td>
                            <td>
                                <a href="{{ route('admin.notice.show', $notice->id) }}" class="button gray"><i class="sl sl-icon-eye"></i></a>                            
                                <a href="{{ route('admin.notice.delete', $notice->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
                            </td>   
                        </tr>                        
                        @endforeach                    
                    </tbody>
                </table>
            </div>
        </div>
        {!! $notices->links() !!}  
    </div>
</div>
@endsection
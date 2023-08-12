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
            <h4 class="gray">Blog List <a href="{{ route('admin.blog.create') }}" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Title</th>      
                            <th>Excerpt</th> 
                            <th>Publish</th> 
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)                    
                        <tr>
                            <td><a href="{{ route('admin.blog.edit', $blog->id) }}">{!! $blog->title !!}</a></td>
                            <td>{!! Str::limit($blog->excerpt, 100)  !!}</td>
                            <td>{!! $blog->date_time  !!}</td>
                            <td><img src="/public/images/blog/thumb/{!! $blog->thumb !!}"> </td>
                            <td><span class="{{ $blog->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $blog->is_active == 1 ? 'Publish' : 'Unpublish' !!}</span></td>
                            <td>
                                <a href="{{ route('admin.blog.show', $blog->id) }}" class="button gray"><i class="sl sl-icon-eye"></i></a>                            
                                <a href="{{ route('admin.blog.delete', $blog->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
                            </td>   
                        </tr>                        
                        @endforeach                    
                    </tbody>
                </table>
            </div>
        </div>
        {!! $blogs->links() !!}  
    </div>
</div>
@endsection
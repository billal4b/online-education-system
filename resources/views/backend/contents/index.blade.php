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
            <h4 class="gray">Section Content List <a href="{{ route('admin.content.create') }}" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Section</<th>  
                            <th>Title</th>      
                            <th>Content</th> 
                            <th>Order</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content)                    
                        <tr>
                            <td> <a href="{{ route('admin.content.edit', $content->id) }}">{!! $content->section_name !!}</a></td>
                            <td>{!! $content->title !!}</td>
                            <td>{!! Str::limit($content->content, 100)  !!}</td>
                            <td>{!! $content->order!!}</td>
                            <td><span class="{{ $content->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $content->is_active == 1 ? 'Active' : 'Inactive' !!}</span></td>
                            <td>                            
                                <a href="{{ route('admin.content.show', $content->id) }}" class="button gray"><i class="sl sl-icon-eye"></i></a>
                                <a href="{{ route('admin.content.delete', $content->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
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


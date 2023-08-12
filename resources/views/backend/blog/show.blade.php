@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="{{ route('admin.blog') }}" ><span class="button gray">List</span></a> </h4>    
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        
                        <tr>
                            <td><b>Title</b></td>
                            <td>{!! $show->title !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Excerpt</b></td>
                            <td>{!! $show->excerpt !!}</td>                              
                        </tr>
                        <tr>
                            <td><b>Content</b></td>
                            <td>{!! $show->content !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Date</b></td>
                            <td>{!! $show->date_time !!}</td>                              
                        </tr>      
                        <tr>
                            <td><b>Image</b></td>
                            <td><img width="1000" height="550" src="/public/images/blog/{!! $show->image !!}"></td>                              
                        </tr>                
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
@endsection
@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Notice <a href="{{ url()->previous() }}"><span class="button gray">Back</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        
                        <tr>
                            <td><b>Title</b></td>
                            <td>{!! $show->title !!}</td>                              
                        </tr>  
                        
                        <tr>
                            <td><b>Content</b></td>
                            <td>{!! $show->content !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Slug</b></td>
                            <td>{!! $show->slug !!}</td>                              
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td>{!! $show->publish_at !!}</td>                              
                        </tr>      
                                       
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
@endsection
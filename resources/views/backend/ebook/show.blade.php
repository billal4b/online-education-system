@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="{{ url()->previous() }}" ><span class="button gray">List</span></a> </h4>    
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        <tr>
                            <td><b>Cousrse</b></td>
                            <td>{!! $show->course_title !!}</td>                              
                        </tr>    
                        <tr>
                            <td><b>Subject</b></td>
                            <td>{!! $show->subject !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Subject Code</b></td>
                            <td>{!! $show->subject_code !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Content</b></td>
                            <td>{!! $show->content !!}</td>                              
                        </tr>  
                        <tr>
                            <td><b>Status</b></td>
                            <td>{!! $show->is_active == 1 ? 'Active' : 'Inactive' !!}</td>                              
                        </tr>                   
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
@endsection
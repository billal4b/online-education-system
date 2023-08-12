@extends('backend.layouts.template')
@section('css')
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
   </style> 
@endsection
@section('main-content')
<div class="row">
    @include('flash-message')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">User List</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>   
                        <th>Mobile</th>    
                        <th>Email</th>                                            
                        <th>Course</th>
                        <th>Address</th>  
                        <th>Date</th>  
                         
                        <th>Online</th>                                                 
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><a href="{{ route('admin.edit', $user->id) }}">{{$user->name}}</a></td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->course_title}}</td>
                        <td>{{$user->address}}</td>                                                                   
                        <td>{{$user->updated_at->format('d-m-Y')}}</td>
                        
                        <td>
                            @if($user->isOnline())
                                <span class="text-success"> Online</span>
                            @else
                                <span class="text-muted"> Offline</span>
                            @endif    
                        </td>     
                        <td><span class="{{ $user->status == 'active' ? 'paid' : 'cancel' }} t-box">{!! $user->status == 'inactive' ? 'Pending' : 'Approved' !!}</span></td>
                        <td>
                            <a href="{{ route('admin.user.delete', $user->id) }}" onclick="return confirm('Are you sure to Delete?')" class="button">Delete</a>
                        </td>
                    </tr>  
                    @endforeach                      
                </tbody>
            </table>               
            </div>
        </div>
        
          {!! $users->links() !!}    
    </div>
</div>
@endsection
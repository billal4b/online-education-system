@extends('userend.layouts.template')
@section('css')
    <style>
        tbody td a { color: #337ab7; text-decoration: underline; }
        tbody td span { color: brown; font-weight: bold}
    </style>
@endsection
@section('main-content')
<div class="row">
   
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">            
            <h4 class="gray">Your Payment</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Date</th>                          
                        <th>Amount</th>  
                        <th>Tran. id</th>  
                        <th>Course</th>                                               
                        <th>Payment Method</th>                                               
                    </tr>
                </thead>
                <tbody>                  
                    @foreach ($data as $payment)                    
                    <tr>           
                        <td>{{$payment->user->name}}</td>             
                        <td>{{ $payment->user_id }}</td>               
                        <td>{!! date('d-m-Y', strtotime($payment->date_time)) !!}</td>                                                      
                        <td><span>{{ $payment->payment_amount }}</span></td>
                        <td>{{ $payment->transaction_id }}</td>
                        <td>
                            @if (!empty($payment->course_title))
                                @foreach($payment->course_title as $v)
                                    @isset($courses[$v])
                                        <li> {{ $courses[$v] }} </li>
                                    @endisset
                                @endforeach
                            @endif
                        </td>                      
                        <td>{!! $payment->payment_method !!}</td>   
                         
                    </tr>                        
                    @endforeach                    
                </tbody>
            </table>
            </div>
        </div>
      
    </div>
</div>
@endsection


@section('scripts')
<script>
   
</script>
@endsection

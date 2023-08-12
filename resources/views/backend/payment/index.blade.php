@extends('backend.layouts.template')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
    <style>
        .select2-container--bootstrap .select2-selection--single { height: 41px; }
        tbody td a { color: #337ab7; text-decoration: underline; }
        tbody td span { color: brown; font-weight: bold}
    </style>
@endsection
@section('main-content')
<div class="row">
    <form action="{{route('admin.payment')}}" method="get" autocomplete="off">        
        <div class="col-md-3" style="padding-left:20px;padding-right: 0">            
            <select name="course_title" id="course_title">
                <option value="" selected>--- Select Course ---</option>
                @foreach($courses as $k=>$v)
                    @if(@$courseId == $k)
                        <option value="{{$k}}" selected>{{$v}}</option>
                    @else
                        <option value="{{$k}}">{{$v}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-3" style="padding-left:20px;padding-right:0;">
            <input type="hidden" name="name_text" id="name_text" value="{{@$nameText}}">
            <select name="student_id" id="nameSelection">
                @if(@$nameKey != null)
                    <option value="{{@$nameKey}}" class="form-control" selected>{{@$nameText}}</option>
                @endif
            </select>
        </div>
        <div class="col-md-3" style="padding-left:20px;padding-right: 0">
            <input type="text" class="form-control" name="daterange" id="dateRange" value="{{@$dateRange}}"
                   placeholder="Select Date Range">
        </div>
        <div class="col-md-1" style="padding-left:20px;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px; padding: 5px 15px; ">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">            
            <h4 class="gray">List of Payment <a href="{{ route('admin.payment.create') }}" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>S.Name</th>
                        <th>S.ID</th>
                        <th>Date</th>                          
                        <th>Amount</th>  
                        <th>Tran. id</th>  
                        <th>Contact</th>  
                        <th>Course</th>                                               
                        <th>Method</th>                                               
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                  
                    @foreach ($data as $payment)                    
                    <tr>           
                        <td><a href="{{ route('admin.payment.edit', $payment->id) }}"><i class="sl sl-icon-pencil"></i> {{$payment->user->name}}</a></td>             
                        <td>{{ $payment->user_id }}</td>               
                        <td>{!! date('d-m-Y', strtotime($payment->date_time)) !!}</td>                                                      
                        <td><span>{{ $payment->payment_amount }}</span></td>
                        <td>{{ $payment->transaction_id }}</td>
                        <td>{{ $payment->contact }}</td>
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
                        <td>
                            <a href="{{ route('admin.payment.delete', $payment->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
                        </td>   
                    </tr>                        
                    @endforeach                    
                </tbody>
            </table>
            </div>
        </div>
        {!! $data->links() !!}
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('public/select2/select2.js')}}"></script>
<script>
    $(document).ready(function () {
        function clearDefaultDateRange() {
            setTimeout(function () {
                $('#dateRange').val('')
            }, 100)
        }

        @if(empty($dateRange))
        clearDefaultDateRange()
        @endif
        $('#nameSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Student ID",
            ajax: {
                url: '{{route('admin.payment.search')}}',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
        $('#nameSelection').change(function () {
            $('#name_text').val($('#nameSelection option:selected').text())
        })
        $('#dateRange').daterangepicker({
            //autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY',
                separator: ' to '
            },
            maxSpan: {
                "days": 30
            },
        });
        $(document).on('click', '.cancelBtn', function (ev, picker) {
            $('#dateRange').val('');
        });
    });
</script>
@endsection

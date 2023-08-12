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
            <h4 class="gray">Fund Pledge Donor List</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Amount</th>
                        <th>Pledge Clause</th>
                        <th>Pledge Time</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($FundPledge as $donor)
                    <tr>
                        <td><a href="{{ route('admin.pledge.edit', $donor->id) }}"><i class="sl sl-icon-pencil"></i> {{$donor->name}}</a></td>
                        <td>{{$donor->address}}</td>
                        <td>{{$donor->contact}}</td>
                        <td>{{$donor->fund_amount}}</td>
                        <td>{{$donor->pledge_clause}}</td>
                        <td>{{$donor->pledge_time}}</td>
                        <td>{{$donor->issue_date}}</td>
                        <td>
                            <a href="{{ route('admin.pledge.show', $donor->id) }}" class="button">View</a>
                            <a onclick="return confirm('Are you sure to Delete?')" href="{{ route('admin.pledge.delete', $donor->id) }}" class="button">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {!! $FundPledge->links() !!}
    </div>
</div>
@endsection

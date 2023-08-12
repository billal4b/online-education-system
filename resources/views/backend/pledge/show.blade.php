@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Details<a href="{{ route('admin.pledge.user') }}" ><span class="button gray">Donor List</span></a> </h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <tbody>
                        <tr>
                            <td><b>Name</b></td>
                            <td>{!! $show->name !!}</td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td>{!! $show->address !!}</td>
                        </tr>
                        <tr>
                            <td><b>City</b></td>
                            <td>{!! $show->city !!}</td>
                        </tr>
                        <tr>
                            <td><b>Post Code</b></td>
                            <td>{!! $show->post_code !!}</td>
                        </tr>
                        <tr>
                            <td><b>Contact</b></td>
                            <td>{!! $show->contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>{!! $show->email !!}</td>
                        </tr>

                        <tr>
                            <td><b>Emergency Contact Name</b></td>
                            <td>{!! $show->ref_name !!}</td>
                        </tr>
                        <tr>
                            <td><b>Relationship</b></td>
                            <td>{!! $show->relationship !!}</td>
                        </tr>
                        <tr>
                            <td><b>Emergency Contact</b></td>
                            <td>{!! $show->ref_contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>Emergency Email</b></td>
                            <td>{!! $show->ref_email !!}</td>
                        </tr>
                        <tr>
                            <td><b>Amount</b></td>
                            <td>{!! $show->fund_amount !!}</td>
                        </tr>
                        <tr>
                            <td><b>Pledge Clause</b></td>
                            <td>{!! $show->pledge_clause !!}</td>
                        </tr>
                        <tr>
                            <td><b>Pledge Time</b></td>
                            <td>{!! $show->pledge_time !!}</td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td>{!! $show->issue_date !!}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

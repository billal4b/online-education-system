@extends('backend.layouts.template')

@section('main-content')
<div class="row">
    @include('flash-message')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">All Message</h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($contactUs as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$contact->created_at->format('d-m-Y')}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->mobile_no}}</td>
                        <td>
                            <a href="{{ route('admin.contact.delete', $contact->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"></i></a>
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

@extends('backend.layouts.template')
@section('css')
<style>
    .select2-selection.select2-selection--single{
        height: 40px !important;
    }
</style>
@endsection
@section('main-content')
<div class="row">
    <form action="{{route('admin.arabic-dictionary')}}" method="get" autocomplete="off">
        <div class="col-md-4" style="padding-right: 0">
            <input type="hidden" id="lesson_no" name="lesson_no" value="{{@$lesson_no}}">
            <select name="subject" id="subject" class="form-control">
                <option selected value="1">{{ @$lesson_no }}</option>
            </select>
        </div>
        <div class="col-md-6" style="padding-right: 0">
            <input type="search" name="keyword" placeholder="Write text to search everywhere" id="topic_text" value="{{@$keyword}}">
        </div>
        <div class="col-md-1" style="padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Arabic Word List <a href="{{ route('admin.arabic-dictionary.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th width="20%">Bengali Word</th>
                            <th width="20%">Arabic Word</th>
                            <th width="20%">English Word</th>
                            <th width="15%">Lesson No</th>
                            <th width="10%" class="text-center">Total Used</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $aDictionary)
                        <tr>
                            <td>{!! $aDictionary->bengali_word !!}</td>
                            <td>{!! $aDictionary->arabic_word !!}</td>
                            <td>{!! $aDictionary->english_word !!}</td>
                            <td>{!! $aDictionary->lesson_no !!}</td>
                            <td class="text-center">{!! $aDictionary->total_mentioned !!}</td>
                            <td>
                                <a href="{{ route('admin.arabic-dictionary.edit', $aDictionary->id) }}" class="button">Edit</a>
                                <a href="{{ route('admin.arabic-dictionary.delete', $aDictionary->id) }}" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
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
    <link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('public/select2/select2.js')}}"></script>
    <script>
        $('#subject').select2({
            theme: "bootstrap",
            tags: true,
            allowClear: true,
            placeholder: 'Type Subject',
            minimumInputLength: 0,
            ajax: {
                url: '{{route('dictionary.quarnic.subject.search')}}',
                dataType: 'json'
            }
        }).on('change', function (e) {
            let sub = $(this).find(":selected").text();
            $('#lesson_no').val(sub)
        })
    </script>
@endsection

@extends('backend.layouts.template')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
   <style>
       tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
   </style>
@endsection
@section('main-content')
    <div class="row">
        <form action="{{route('admin.ebook')}}" method="get" autocomplete="off">
            <div class="col-md-2" style="padding-right: 0">
                <input type="hidden" name="topic_text" id="topic_text" value="{{@$topicText}}">
                <select name="course_name" id="course_name">
                    <option value="" selected>Select Course</option>
                    @foreach(COURSE_NAME as $k=>$v)
                        @if(@$courseId == $k)
                            <option value="{{$k}}" selected>{{$v}}</option>
                        @else
                            <option value="{{$k}}">{{$v}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" style="padding-left:0;padding-right: 0">
                <select name="subject_type" id="subject_type">
                    <option value="" selected>Select Subject</option>
                    @foreach(SUBJECT_TYPE as $k=>$v)
                        @if(@$subjectId == $k)
                            <option value="{{$k}}" selected>{{$v}}</option>
                        @else
                            <option value="{{$k}}">{{$v}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding-left:0;padding-right: 0">
                <select name="topic" id="topicSelection">
                    @if(@$topicKey != null)
                        <option value="{{@$topicKey}}" class="form-control" selected>{{@$topicText}}</option>
                    @endif
                </select>
            </div>
            <div class="col-md-3" style="padding-left:0;padding-right: 0">
                <input type="text" class="form-control" name="daterange" id="dateRange" value="{{@$dateRange}}"
                       placeholder="Select Date Range">
            </div>
            <div class="col-md-1" style="padding-left:0;padding-right: 0">
                <input value="Search" type="submit" style="height: 42px;padding: 6px;">
            </div>
        </form>
        <div class="col-lg-12 col-md-12 col-xs-12">
            @include('flash-message')
            <div class="dashboard-list-box">
                <h4 class="gray">eBook List
                    <a href="{{ route('admin.secondebook.create') }}">
                        <span class="button gray">Add</span></a>
                </h4>
                <div class="table-box">
                    <table class="basic-table booking-table">
                        <thead>
                        <tr>
                            <th>Course</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($data as $ebook)
                            <tr>
                                <td><a href="{{ route('admin.secondebook.edit', $ebook->id) }}"><i class="sl sl-icon-pencil"></i> {!! @COURSE_NAME[$ebook->course_id] !!}</a></td>
                                <td>{!! @SUBJECT_TYPE[$ebook->subject_type] !!}</td>
                                <td>{!! $ebook->topic !!}</td>
                                {{-- <td>{!! Str::limit($ebook->content,60)  !!}</td>--}}
                                <td>{{ date('d-M-Y h:i A', strtotime($ebook->publish_time)) }}</td>
                                <td>
                                    <span class="{{ $ebook->published == 2 ? 'paid' : 'cancel' }} t-box">{!! $ebook->published == 2 ? 'Published' : 'Unpublished' !!}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.secondebook.show', $ebook->id) }}" class="button gray"
                                       data-toggle="tooltip" data-placement="top" title="Show"><i
                                                class="sl sl-icon-eye"></i></a>

                                    <a href="{{ route('admin.secondebook.delete', $ebook->id) }}" class="button gray"
                                       onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close"
                                                                                              data-toggle="tooltip"
                                                                                              data-placement="top"
                                                                                              title="Delete"></i></a>
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
            $('#topicSelection').select2({
                theme: "bootstrap",
                placeholder: "Search by Topic",
                ajax: {
                    url: '{{route('ebook.topic.search')}}',
                    dataType: 'json'
                },
                width: '100%',
                allowClear: true,
                minimumInputLength: 2
            });
            $('#topicSelection').change(function () {
                $('#topic_text').val($('#topicSelection option:selected').text())
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

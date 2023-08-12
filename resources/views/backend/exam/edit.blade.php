@extends('backend.layouts.template')
@section('css')
 .my-profile textarea {
       height: auto;
    }
@endsection
@section('main-content')
<div class="dashboard-form">
    <div class="row">
        <form  action="{{ route('admin.exam.update', $edit->id) }}" method="post">
            @csrf
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Question Answer<a href="{{ url()->previous() }}"><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    @php

                                    @endphp
                                    @php
                                        $test = json_decode($answer, true);
                                        //dd($answer);
                                        $a = [];
                                    @endphp
                                        @foreach ($test as $t)

                                            @foreach ($t as $key => $val)
                                               @php $a[$key] = $val; @endphp
                                            @endforeach
                                        @endforeach
                                    @foreach ($a as $k => $v)
                                    <div class="col-lg-10 col-md-10 col-xs-12">
                                        <label for="answer"><strong style="font-size: 25px;">{!! $k !!} </strong></label>
                                        <textarea id="answer" name="answer" type="text" style="font-size: 20px; rows="7" readonly class="form-control @error('answer') is-invalid @enderror">{!! $v !!}</textarea>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-xs-12">
                                        <label for="qs_m"><strong>{{ __('Mark') }}</strong></label>
                                        <input id="answer[{!! trim($k) !!}]" onblur="findTotal()" name="qs_m" type="number" placeholder="Number" class="form-control @error('qs_m') is-invalid @enderror">
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="is_active"><strong>{{ __('Status') }}</strong></label>
                                    <select id="type" name="is_active" class="form-control">
                                        <option value="1" {{ $edit->is_active == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $edit->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="marks"><strong>{{ __('Total Marks') }}</strong></label>
                                    <input id="marks" name="marks" placeholder="Total Number" type="text" value="{!! ($edit->marks) !!}" class="form-control @error('marks') is-invalid @enderror">

                                    @error('marks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <button type="submit" class="button">{{ __('Save') }}</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  function findTotal(){
    var arr = document.getElementsByName('qs_m');
    var tot=0 ;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('marks').value = tot;
}
</script>
@endsection



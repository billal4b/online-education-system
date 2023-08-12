<div class="row">
    {{--course type--}}
    <div class="col-md-8">
        <b><u>Topic:</u></b>
        <h4><span id="topicTitle" style="color: #FF9800">{{@$ebooks[0]['topic']}}</span></h4>
        <hr>
        {{--       <h1>Content goes here</h1>--}}
    </div>
    <div class="col-md-4">
        <h4>
            @if($subjectId == SYLLABUS)
                Recent Syllabus
            @elseif($subjectId == ISLAMIAT)
                Recent Islamiat
            @elseif($subjectId == DUA)
                Recent Dua
            @elseif($subjectId == HOME_WORK)
                Recent Homework
            @endif
        </h4>
        <form action="#" autocomplete="off">
            <div class="form-group has-success has-feedback">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon glyphicon glyphicon-calendar" style="position: relative;
    top: 0px;"></span>
                    <input type="text" class="form-control" id="dateRange" placeholder="Select Date Range">
                </div>
                <small class="pull-right" style="font-size: 11px;">Maximum 10 days</small>
            </div>

            <div class="form-group has-success has-feedback">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon glyphicon glyphicon-search" style="position: relative;
    top: 0px;"></span>
                    <select id="topicSelection" name="state"></select>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-8" id="contntArea">
        @if(count($ebooks))
            <small style="color: #FF9800">
                <i class="ion-ios-calendar-outline"></i> {{date('d/m/Y h:i A',strtotime($ebooks[0]['publish_time']))}}
            </small>
            <br>
            @if($ebooks[0]['content_type'] == EBOOK_CONTENT || $ebooks[0]['content_type'] == EBOOK_BOTH)
                {!! $ebooks[0]['content'] !!}
            @endif
            @if($ebooks[0]['content_type'] == EBOOK_DOCUMENT || $ebooks[0]['content_type'] == EBOOK_BOTH)
                <a href="/public/ebook/<?php echo $ebooks[0]['document']; ?>" target="_blank">
                     <span class="input-group-addon glyphicon glyphicon-download" style="font-size: 30px;">
                     <span style="position: relative;top: -6px">
                         Download Document/File
                     </span>
                     </span>
                </a>
            @endif
        @endif
    </div>
    <div class="col-md-4" id="ebookList">

        @foreach($ebooks as $ebook)

            <u><a href="#" class="topic_link" data-ebookId="{{$ebook['id']}}">{{$ebook['topic']}}</a></u>
            <br>
            <small class="pull-right publish_date">{{date('d/m/Y h:i A',strtotime($ebook['publish_time']))}}</small>
            <br>
        @endforeach
    </div>
</div>
<style>
    .publish_date {
        font-size: 11px;
        color: #FF9800;
    }

    .topic_link {
        font-size: 14px;
    }
    .glyphicon-download:before {
        color: green;
    }
</style>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#dateRange').val('')
        }, 100)
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
    })
</script>

@foreach($ebooks as $ebook)
    <u><a href="#" class="topic_link" data-ebookId="{{$ebook['id']}}">{{$ebook['topic']}}</a></u>
    <br>
    <small class="pull-right publish_date">{{date('d/m/Y h:i A',strtotime($ebook['publish_time']))}}</small>
    <br>
@endforeach
<style>
    .publish_date {
        font-size: 11px;
        color: #FF9800;
    }

    .topic_link {
        font-size: 14px;
    }
</style>

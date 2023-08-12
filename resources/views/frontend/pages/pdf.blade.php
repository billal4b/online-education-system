@extends('frontend.app')
@section('css')
<style>
    .color:hover {
        background-color: yellow;
        padding: 10px;
    }
    .noticelink {
        background-color: yellowgreen;
        padding: 10px;
    }
     table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        text-align: center;
    }
    .empty-data {
        text-align: center;
        font-weight: 700;
    }
</style>
@endsection
@section('title') Lecture Sheet @endsection
@section('pages')

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            @if(!empty($data))
            <div class="col-md-8 col-sm-12">
                <div class="post_img">
                    <img src="images/blog-listing/blog_05.jpg" alt="">
                </div>
                <div class="post_title">
                    <h3>{{ $lastPdf->title }}</h3>
                    <strong>{{ $lastPdf->courses->course_name }}</strong>
                    <ul class="list-inline list-unstyled">
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; {!! date('d-m-Y', strtotime($lastPdf->created_at)) !!}&nbsp;
                        </li>
                    </ul>
                </div>
                <div class="post_body">
                    {!! $lastPdf->content !!}
                </div>
                <br>
                @if ($lastPdf->pdf_file != '')
                <strong class="noticelink">
                    <a href="/public/pdf/{!! $lastPdf->pdf_file !!}" target="_blank"> Please Click Here </a>
                </strong>
                @endif
            </div>
            <aside class="col-md-4 col-sm-12">
                <div class="widget widget_recent_entries"><!-- widget list -->
                    <h3 class="blog_heading_border"> Recent Post </h3>

                    @foreach ($data as $file )
                    <ul>
                        <li>
                            <h4>
                                <a class='color' href="{{ route('pdf.singlePost', $file->slug) }}">{!! $file->title !!}</a>
                            </h4>
                            <p>{!! $file->courses->course_name !!}</p>
                            <p>{!! date('d-m-Y', strtotime($file->created_at)) !!}</p>
                        </li>
                    </ul><br>
                    @endforeach

                </div>
                {!! $data->links() !!}
            </aside>
            @else
                <div class="empty-data">No data found</div>
            @endif            
        </div>
    </div>
</section>

@endsection

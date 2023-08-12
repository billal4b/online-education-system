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
</style>
@endsection
@section('title') Lecture Sheet @endsection
@section('pages')

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <!--*Blog Content Sec*-->
            <div class="col-md-8 col-sm-12">
                <div class="post_img">
                    <img src="images/blog-listing/blog_05.jpg" alt="">
                </div>
                <div class="post_title">
                    <h3>{{ $pdfDetails->title }}</h3>
                    <strong>{{ $pdfDetails->courses->course_name }}</strong>
                    <ul class="list-inline list-unstyled">
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; {!! date('d-m-Y', strtotime($pdfDetails->created_at)) !!}&nbsp;
                        </li>
                    </ul>
                </div>
                <div class="post_body">
                    {!! $pdfDetails->content !!}
                </div>
                <br>
                @if ($pdfDetails->pdf_file != '')
                <strong class="noticelink">
                    <a href="/public/pdf/{!! $pdfDetails->pdf_file !!}" target="_blank"> Please Click Here </a>
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
            <!--* End Blog Sidebar*-->
        </div>
    </div>
</section>

@endsection

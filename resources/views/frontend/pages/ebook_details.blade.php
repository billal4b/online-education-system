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
</style>
@endsection 
@section('title') eBook @endsection
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
                    <h3>{{ $ebookDetails->course_title }}</h3>
                    <h4>{{ $ebookDetails->subject }}</h4>
                    <strong>{{ $ebookDetails->subject_code }}</strong>
                    <ul class="list-inline list-unstyled">                        
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; {!! date('d-m-Y', strtotime($ebookDetails->created_at)) !!}&nbsp; 
                        </li>                      
                    </ul>
                </div>
                <div class="post_body">
                    {!! $ebookDetails->content !!}
                </div>  
               
                <br>
                @if ($ebookDetails->pdf_file != '')
                <strong class="noticelink">                    
                    <a href="/public/ebook/{!! $ebookDetails->pdf_file !!}" target="_blank"> Please Click Here </a>
                </strong>  
                @endif  
            </div>

            <aside class="col-md-4 col-sm-12">   
                <div class="widget widget_recent_entries"><!-- widget list -->
                    <h3 class="blog_heading_border"> Recent eBook </h3>

                    @foreach ($data as $ebook )  
                    <ul>
                        <li>
                            <h4>
                                <a class='color' href="{{ route('ebook.post', $ebook->slug) }}">{!! $ebook->subject !!}  <br>  {!! $ebook->subject_code !!}</a>
                            </h4>
                            <p>{!! date('d-m-Y', strtotime($ebook->created_at)) !!}</p>
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
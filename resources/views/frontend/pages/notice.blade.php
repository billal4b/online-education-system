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
@section('title') Notice @endsection
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
                    <h3>{{ $lastnotice->title }}</h3>
                    <ul class="list-inline list-unstyled">
                        
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; {!! date('d-m-Y', strtotime($lastnotice->publish_at)) !!}&nbsp; 
                        </li>
                      
                    </ul>
                </div>
                <div class="post_body">
                    {!! $lastnotice->content !!}
                </div>  
                <br>
                @if ($lastnotice->file != '')
                <strong class="noticelink">                    
                    <a href="/public/notice/{!! $lastnotice->file !!}" target="_blank"> Please Click Here </a>
                </strong>  
                @endif      
            </div>

            <aside class="col-md-4 col-sm-12">   
                <div class="widget widget_recent_entries"><!-- widget list -->
                    <h3 class="blog_heading_border"> Recent Notices </h3>

                    @foreach ($notices as $notice )  
                    <ul>
                        <li>
                            <h4>
                                <a class='color' href="{{ route('notice.post', $notice->slug) }}">{!! $notice->title !!}</a>
                            </h4>
                            <p>{!! date('d-m-Y', strtotime($notice->publish_at)) !!}</p>
                        </li>                                           
                    </ul><br>
                    @endforeach

                </div>
            </aside>
            <!--* End Blog Sidebar*-->
        </div>
    </div>
</section>

@endsection
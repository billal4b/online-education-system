@extends('frontend.app')
@section('title')
    Blog Details
@endsection
@section('pages')

    <!--* Blog Main Sec*-->
    <section id="blog_main_sec" class="section-inner">
        <div class="container">
            <div class="row">
               
                <!--*Blog Content Sec*-->
                <div class="col-md-8 col-sm-12">
                    <div class="post_img">
                        <img src="/public/images/blog/{!! $blogDetails->image !!}" alt="">
                    </div>
                    <div class="post_title">
                        <h3>{!! $blogDetails->title !!}</h3>
                        <ul class="list-inline list-unstyled">                            
                            <li><i class="ion-ios-calendar-outline"></i>&nbsp;{!! date('d-m-Y', strtotime($blogDetails->date_time)) !!}&nbsp;</li>                           
                        </ul>
                    </div>
                    <div class="post_body">
                            {!! $blogDetails->content !!}
                    </div>                   
                </div>
                <!--* End Blog Content Sec*-->
                <!--* Blog Sidebar*-->
                <aside class="col-md-4 col-sm-12">                  

                    <div class="widget widget_recent_entries"><!-- widget list -->
                        <h3 class="blog_heading_border"> Recent Posts </h3>
                        <ul>
                            @foreach ($recentPosts as $recentPost)                             
                                <li>
                                    <img src="/public/images/blog/thumb/{!! $recentPost->thumb !!}" alt="image" />
                                    <h4>
                                        <a href="{{ route('blog.post', $recentPost->slug) }}">{!! $recentPost->title !!}</a>
                                    </h4>
                                    <p>{!! date('d-m-Y', strtotime($recentPost->date_time)) !!}</p>
                                </li>
                            @endforeach                            
                                                    
                        </ul>
                    </div><!-- End widget list -->

                    <div class="widget widget_categories"><!-- widget list -->
                        <h3 class="blog_heading_border"> Blog Categories </h3>
                        <ul>
                            <li>
                                <a href="#"> All </a>
                                <span class="categoryCount">(50)</span>
                            </li>
                            <li>
                                <a href="#"> Quran </a>
                                <span class="categoryCount">(10)</span>
                            </li>
                            <li>
                                <a href="#"> Hadees </a>
                                <span class="categoryCount">(07)</span>
                            </li>                          
                          
                            <li>
                                <a href="#"> Security </a>
                                <span class="categoryCount">(05)</span>
                            </li>                           
                        </ul>
                    </div><!-- End widget list -->

                    <div class="widget widget_follow"><!-- widget list -->
                            <h3 class="blog_heading_border">Follow Me</h3>
                            <div class="blog-social">
                                <a href="https://www.facebook.com/IQSBD/" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-facebook"></span>
                                    </div>
                                </a>                              
                                <a href="#" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-instagram"></span>
                                    </div>
                                </a>                              
                                <a href="#" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-linkedin"></span>
                                    </div>
                                </a>
                                <a href="https://www.youtube.com/channel/UCC8fmiTe_zkx1JvUqGCfKlg" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-youtube-play"></span>
                                    </div>
                                </a>
                            </div><!-- end blog-social -->
                    </div><!-- End widget list -->
                   
                </aside>
                <!--* End Blog Sidebar*-->

            </div>
        </div>
    </section>
    <!--*End Blog Main Sec*-->

@endsection
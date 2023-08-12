@extends('frontend.app')
@section('title')
    Blog
@endsection
@section('pages')
  
    <!--* Blog div Sec*-->
    <section id="blog_main_sec" class="grid-view section-inner">
        <div class="container">
            <div class="row">

                <!--*Blog Content Sec*-->
                <div class="col-md-8 col-sm-12">

                    <div class="row blog_post_sec">

                        @foreach ($blogs as $blog)

                            <div class="col-md-6 col-sm-6 col-xs-12 grid-item">
                                <div class="blog-post_wrapper">
                                    <div class="blog-post-inner_wrapper">
                                        <div class="blog-post-image">
                                            <div class="clearfix">
                                                <div class="img">
                                                    <img src="public/images/blog/{!! $blog->image !!}" alt="image" class="img-responsive center-block post_img" /> </div>
                                            </div>
                                        </div>
                                        <div class="post-detail_container">
                                            <div class="post-content">
                                                <h5 class="post-title entry-title">
                                                    <a href="{{ route('blog.post', $blog->slug) }}">{!! $blog->title !!}</a>
                                                </h5>
                                                <ul class="list-unstyled list-inline post-metadata">
                                                    <li><i class="ion-ios-stopwatch-outline"></i>&nbsp{!! date('d-m-Y', strtotime($blog->date_time)) !!}&nbsp</li>                                                  
                                                </ul>
                                                <p class="post-excerpt">{!! $blog->excerpt    !!}</p>
                                                <div class="view_detail text-center">
                                                    <a href="{{ route('blog.post', $blog->slug) }}" class="mt_btn_yellow">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>

                        @endforeach 


                    </div>
                    
                    {!! $blogs->links() !!}  

                </div>
                <!--* End Blog Content Sec*-->


                <!--* Blog Sidebar*-->
                <aside class="col-md-4 col-sm-12">
                    <div class="widget"><!-- widget list -->
                        <h3 class="blog_heading_border"> Search </h3>
                        <form class="search-form" role="search" action="#" method="post">
                            <input id="sidebar-search" placeholder="Search" type="text" /> 
                        </form>
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

                    <div class="widget widget_custom_menu"><!-- widget list -->
                        <h3 class="blog_heading_border"> Custom Menu </h3>
                        <ul>
                            <li>
                                <a href="/"> Home </a>
                            </li>
                            <li>
                                <a href="/about-us"> About us </a>
                            </li>
                            <li>
                                <a href="/courses"> Courses </a>
                            </li>
                            <li>
                                <a href="/video"> Video </a>
                            </li>
                            <li>
                                <a href="/gallery"> Gallery </a>
                            </li>
                            <li>
                                <a href="/blog"> Blog </a>
                            </li>
                            <li>
                                <a href="/contact-us"> Contact Us </a>
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
                                <a href="https://www.pinterest.com/infoiqs/" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-pinterest"></span>
                                    </div>
                                </a>                              
                                <a href="https://www.instagram.com/iqs.learning/" target="_blank">
                                    <div class="socibox">
                                        <span class="fa fa-instagram"></span>
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
    <!--*End Blog div Sec*-->
@endsection
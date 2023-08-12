@extends('frontend.app')

@section('title')
    Lecture Sheet
@endsection

@section('pages')

<section id="blog_main_sec" class="grid-view section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3>Video lecture </h3>
        </div>
        <div class="row">
            <!--*Blog Content Sec*-->
            <div class="col-md-12">
                <div class="row blog_post_sec">   

                    @foreach ($videos as $video)  

                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item">
                        <div class="blog-post_wrapper">
                            <div class="blog-post-inner_wrapper">
                                <div class="blog-post-image">
                                    <div class="clearfix">
                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                                            <iframe class="embed-responsive-item" src="{!! $video->video !!}" style="height: 101%"
                                              allowfullscreen></iframe>
                                          </div>
                                    </div>
                                </div>
                                <div class="post-detail_container">
                                    <div class="post-content">
                                        <h3 class="post-title entry-title">
                                            {!! $video->title !!}
                                        </h3>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach                  

            </div>
            <!--* End Blog Content Sec*-->           
        </div>
    </div>
</section>
@endsection
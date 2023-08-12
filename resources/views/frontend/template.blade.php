<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head prefix="og: http://ogp.me/ns#">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Institute of Quranic Studies </title>
    <meta name="description" content="Institute of Quranic Studies">
    
    <!--for fb -->
	<meta property="og:title" content="IQSBD | Institute of Quranic Studies" />
	<meta property="og:site_name" content="Institute of Quranic Studies" />
	<meta property="og:description" content="Quranic Education/language, Online & Offline class Opportunity, Islamic Lifestyle, Video Tutorial, Lecture Sheet" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://iqsbd.com" />
	<meta property="og:image" content="https://iqsbd.com/public/images/iqsbd_social_logo.png"/>
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	<meta name="fb:app_id" property="fb:app_id" content="1174598416027864" />		
    <!--canonical link-->
	<link rel="canonical" href="https://iqsbd.com">
	<!--shortcut icon -->
     <link rel="icon" type="image/png" href="{{asset('public/images/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="36x36"  href="{{asset('public/images/android-icon-36x36.png')}}">
    
   

    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/default.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/modal-video-min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/plugin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/flaticon1.css')}}" rel="stylesheet" type="text/css">
    <style>
        @media only screen and (min-width: 1200px) {
              .panel-grid-banner { margin-top: 30px;}
        }
        
    
    </style>
    @yield('css')
</head>
<body>
    @include('frontend.header') 

    @include('frontend.template_slider')   
    <!-- About Courses -->
    <div class="edu-courses">
        <div class="container">
            <div class="panel-grid-banner">
                <div class="col-sm-4 col-xs-12">
                    <div class="inner-grid text-center">                        
                        <div class="text-courses">
                            <i class="fa fa-graduation-cap mar-bottom-20"></i>
                            <h3>Quran Teaching Course</h3>
                        </div>
                        <div class="courses-content">
                            <p class="mar-top-20">Learn Quran with The IQS. We have now designed a series of Quranic Courses for kids and adults to such as Quran Memorization and Quran Recitation.</p>
                            <a href="{{ url('/quran-teaching-course') }}" class="mt_btn_yellow">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="inner-grid text-center">                        
                        <div class="text-courses">
                            <i class="fa fa-users mar-bottom-20"></i>
                            <h3>Arabic Language course</h3>
                        </div>
                        <div class="courses-content">
                            <p class="mar-top-20">Quran Courses will teach you how to communicate in Arabic and have a fluent speech. You can also learn Arabic numbers, conjugate Arabic verbs and Arabic grammar as well.</p>
                            <a href="{{ url('/arabic-language-teaching-course') }}" class="mt_btn_yellow">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="inner-grid text-center">                        
                        <div class="text-coursesa">
                            <i class="fa fa-book mar-bottom-20"></i>
                            <h3>Hifjul Quran</h3>
                        </div>
                        <div class="courses-content">
                            <p class="mar-top-20">Like every other IQS initiatives, Hifz program is another non-profit initiative. The goal is to provide an opportunity to do Hifz for the non-madrasa going children.</p>
                            <a href="{{ url('/hifjul-quran') }}" class="mt_btn_yellow ">Read More</a>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
    <!-- End About Courses -->

    <!--*About*-->
    <section id="mt_about">
        <div class="container">
            <div class="about_services">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="about-items">
                            <div class="inner-heading">
                                <h3><a href="/about-us">{!! $aboutUs->title !!}</a></h3>
                            </div>
                            <p>{!! $aboutUs->content !!}</p>
                        </div>
                    </div>     
                    
                </div>
            </div>
        </div>
    </section>
    <!--*EndAbout*-->
    
 <!--*Apply*-->
 <section id="mt_about">
        <div class="container">
            <div class="about_services">
                <div class="row">                  
                    <div class="col-xs-12">
                        <div class="about-form">
                            <div class="col-sm-9">
                                <div class="about-sch-form">
                                    <div class="event-title">
                                        <h2>{!! $apply->title !!}</h2>
                                        <p>{!! $apply->content !!}</p>
                                    </div> <!-- event title -->                                    
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="smt-items mar-top-40">
                                    <a class="mt_btn_yellow" href="{{ url('/registration') }}">Apply Here</a>
                                </div>
                            </div>
                        </div>                        
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
    <!--*EndApply*-->


    <section id="blog_main_sec" class="grid-view section-inner">
        <div class="container">
            <div class="inner-heading">
                <h3><a href="/blog">Blog</a></h3>
            </div>
                <!--*Blog Content Sec*-->
                <div class="col-md-12">
                    <div class="row blog_post_sec">      
                        @foreach ($blogs as $blog)
                        <div class="col-md-4 col-sm-6 col-xs-12 grid-item">
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
                                                <li>
                                                    <i class="ion-ios-stopwatch-outline"></i> &nbsp;{!! date('d-m-Y', strtotime($blog->date_time)) !!}&nbsp;</li>
                                               
                                            </ul>
                                            <p class="post-excerpt">{!! $blog->excerpt !!}</p>
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
                <!--* End Blog Content Sec*-->           
            </div>
        </div>
    </section>

    
 <!--*Apply*-->
 <!--<section id="mt_about">-->
 <!--       <div class="container">-->
 <!--           <div class="about_services">-->
 <!--               <div class="row">                  -->
 <!--                   <div class="col-xs-12">-->
 <!--                       <div class="about-form">-->
 <!--                           <div class="col-sm-9">-->
 <!--                               <div class="about-sch-form">-->
 <!--                                   <div class="event-title">-->
 <!--                                       <h2> IQS সোশ্যাল ডেভেলপমেন্ট </h2>-->
 <!--                                       <p>IQS সমাজের সকল শ্রেণী পেশার মানুষকে কুরআন শিক্ষার আলোয় আলোকিত করতে গত দশ বছর ধরে নিরলস কাজ করে যাচ্ছে।</p>-->
 <!--                                   </div> <!-- event title -->                                    
 <!--                               </div>-->
 <!--                           </div>-->
 <!--                           <div class="col-sm-3">-->
 <!--                               <div class="smt-items mar-top-40">-->
 <!--                                   <a class="mt_btn_yellow" target="_blank" href="http://socialdevelopment.iqsbd.com/">Read More</a>-->
 <!--                               </div>-->
 <!--                           </div>-->
 <!--                       </div>                       
 <!--                   </div>-->

                    
 <!--               </div>-->
 <!--           </div>-->
 <!--       </div>-->
 <!--   </section>-->
 
    <!--*EndApply*-->


    <!--* Testimonial*-->
    <section id="const-testi" class="edu-testimonial">
        <div class="container">      
            <div class="row">
                <div class="col-sm-6">
                    <!-- section title -->
                    <div class="inner-heading">
                        <h3 class="white">Testimonials</h3>
                        <h2 class="white">To the Guardians:</h2>
                        <div class="testimonial-abt">
                            <p class="white">Emphasizing on learning Al-Quran for well-being of kids. For completing course within due time ensure class attendance of your child regulary. Children don’t care about learning Al-Quran either guardian don’t.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row slider-eductestimo">
                        

                        <div class="col-sm-4">
                            <div class="item">
                            <div class="testimonial_main">
                                <div class="client-pic"><img src="public/images/admin.png" alt=""></div>
                                <h4>
                                    <a href="#" class="text-uppercase">Faijul Haque</a>
                                    <span> Founder and Director </span>
                                </h4>
                                <p>Your humble coordination is expected to implement the Objectives & goal is IQS.</p>
                                
                            </div>
                            </div>
                        </div>                   

                    </div>
                </div>
            </div>      
        </div>
    </section>
    <!--* EndTestimonial*-->
    
    <!--*Features-one*-->

    @include('frontend.pages.courses') 
    
    <!--*EndFeatures-one*-->     

    
    <br/><br/><br/>

    @include('frontend.footer')
    <!-- back to top -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
        <span class="fa fa-arrow-up"></span>
    </a>
    <!--*Scripts*-->
    <script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.parallax-1.1.3.js')}}"></script>    
    <script src="{{asset('public/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('public/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('public/js/wow.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.nav.js')}}"></script>
    <script src="{{asset('public/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/js/custom-magnificpopup.js')}}"></script>
    <script src="{{asset('public/js/slick.js')}}"></script>
    <script src="{{asset('public/js/slicknav.js')}}"></script>
    <script src="{{asset('public/js/custom-nav.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.appear.js')}}"></script>
    <script src="{{asset('public/js/isotope.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('public/js/jquery-modal-video.min.js')}}"></script>
    <script src="{{asset('public/js/custom-modalvideo.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
   <!-- This site is converting visitors into subscribers and customers with Rocketbots - https://rocketbots.io -->
<script src="https://app.rocketbots.io/facebook/chat/plugin/19277/1174598416027864" async></script>
<!-- https://rocketbots.io/ -->

</body>
</html>
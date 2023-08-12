<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Institute of Quranic Studies">
    <title>Institute of Quranic Studies </title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="36x36"  href="<?php echo e(asset('images/android-icon-36x36.png')); ?>">

    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/default.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/modal-video-min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/plugin.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/magnific-popup.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/flaticon1.css')); ?>" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

    <?php echo $__env->make('frontend.template_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    <!-- About Courses -->
    <div class="edu-courses">
        <div class="container">
            <div class="panel-grid-banner">
                <div class="col-sm-4 col-xs-12">
                    <div class="inner-grid text-center">                        
                        <div class="text-courses">
                            <i class="fa fa-graduation-cap mar-bottom-20"></i>
                            <h3>Quran Teaching Courses</h3>
                        </div>
                        <div class="courses-content">
                            <p class="mar-top-20">The goal is to provide an opportunity to do Hifz for the non-madrasa going children.</p>
                            <a href="<?php echo e(url('/hifjul-quran')); ?>" class="mt_btn_yellow">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="inner-grid text-center">                        
                        <div class="text-courses">
                            <i class="fa fa-users mar-bottom-20"></i>
                            <h3>Arabic Language Teaching courses</h3>
                        </div>
                        <div class="courses-content">
                            <p class="mar-top-20">Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
                            <a href="<?php echo e(url('/adult-quranic-shikkha')); ?>" class="mt_btn_yellow">Read More</a>
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
                            <p class="mar-top-20">Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
                            <a href="<?php echo e(url('/arabic-shikkha')); ?>" class="mt_btn_yellow ">Read More</a>
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
                                <h3>IQS</h3>
                            </div>
                            <p>This is the golden opportunity for children of reciting Al-Quran having with pure accent & melodious voice and of establishing precise salah. 
                                    To ensure children as a real human being in the society through reciting Al-Quran & teaching morals along with modern study is the goal of IQS.      
                            </p>
                        </div>
                    </div>     
                    
                </div>
            </div>
        </div>
    </section>
    <!--*EndAbout*-->
 <!--*About*-->
 <section id="mt_about">
        <div class="container">
            <div class="about_services">
                <div class="row">                  
                    <div class="col-xs-12">
                        <div class="about-form">
                            <div class="col-sm-9">
                                <div class="about-sch-form">
                                    <div class="event-title">
                                        <h2>Apply for Admission</h2>
                                        <p>We don’t just give students an education and experiences that set them up for success in a career. We help them succeed in their career—to discover a field they’re passionate about and dare to lead it.</p>
                                    </div> <!-- event title -->                                    
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="smt-items mar-top-70">
                                    <a class="mt_btn_yellow" href="<?php echo e(url('/registration')); ?>">Apply Here</a>
                                </div>
                            </div>
                        </div>                        
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
    <!--*EndAbout*-->


    <section id="blog_main_sec" class="grid-view section-inner">
        <div class="container">
            <div class="inner-heading">
                <h3>Blog </h3>
            </div>
                <!--*Blog Content Sec*-->
                <div class="col-md-12">
                    <div class="row blog_post_sec">      
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 grid-item">
                            <div class="blog-post_wrapper">
                                <div class="blog-post-inner_wrapper">
                                    <div class="blog-post-image">
                                        <div class="clearfix">
                                            <div class="img">
                                                <img src="images/blog/<?php echo $blog->image; ?>" alt="image" class="img-responsive center-block post_img" /> </div>
                                        </div>
                                    </div>
                                    <div class="post-detail_container">
                                        <div class="post-content">
                                            <h5 class="post-title entry-title">
                                                <a href="<?php echo e(route('blog.post', $blog->url)); ?>"><?php echo $blog->title; ?></a>
                                            </h5>
                                            <ul class="list-unstyled list-inline post-metadata">
                                                <li>
                                                    <i class="ion-ios-stopwatch-outline"></i> &nbsp;<?php echo date('d-m-Y', strtotime($blog->date_time)); ?>&nbsp;</li>
                                               
                                            </ul>
                                            <p class="post-excerpt"><?php echo Str::limit($blog->content, 100); ?></p>
                                            <div class="view_detail text-center">
                                                <a href="<?php echo e(route('blog.post', $blog->url)); ?>" class="mt_btn_yellow">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    </div>     
                <!--* End Blog Content Sec*-->           
            </div>
        </div>
    </section>



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
                                <div class="client-pic"><img src="images/admin.png" alt=""></div>
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
    <section class="features-one">
        <div class="container">
            <div class="inner-heading">
                <h3>Featured courses</h3>
                <h2>Various courses to choose from</h2>
            </div>

            <div class="row  slider slider-ft-course">
                <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="images/education/iqs-1.jpg" alt="">
                            <div class="th-name">
                                <h4>Kaidah</h4>
                            </div>
                            <div class="overlayPort">
                                <ul class="info text-center list-inline">
                                    <li>
                                        <a href="<?php echo e(url('/courses')); ?>">View Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="featured-item">
                            <div class="feat-img">
                                <img src="images/education/iqs-2.jpg" alt="">
                                <div class="th-name">
                                    <h4>Amparra</h4>
                                </div>
                                <div class="overlayPort">
                                    <ul class="info text-center list-inline">
                                        <li>
                                            <a href="<?php echo e(url('/courses')); ?>">View Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                         
                        </div>
                    </div>

                
                <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="images/education/iqs-3.jpg" alt="">
                            <div class="th-name">
                                <h4>Najerah</h4>
                            </div>
                            <div class="overlayPort">
                                <ul class="info text-center list-inline">
                                    <li>
                                        <a href="<?php echo e(url('/courses')); ?>">View Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                     
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="images/education/iqs-4.jpg" alt="">
                            <div class="th-name">
                                <h4>Arabian Hifjul Quran</h4>
                            </div>
                            <div class="overlayPort">
                                <ul class="info text-center list-inline">
                                    <li>
                                        <a href="<?php echo e(url('/courses')); ?>">View Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>                     
                    </div>
                </div>   
                <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="featured-item">
                            <div class="feat-img">
                                <img src="images/education/iqs-4.jpg" alt="">
                                <div class="th-name">
                                    <h4>As Salah & Daily Prayer</h4>
                                </div>
                                <div class="overlayPort">
                                    <ul class="info text-center list-inline">
                                        <li>
                                            <a href="<?php echo e(url('/courses')); ?>">View Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>                     
                        </div>
                    </div>            
            </div>
        </div><!-- /.container -->       
    </section>
    <!--*EndFeatures-one*-->     

    
    <br/><br/><br/>

    <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- back to top -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
        <span class="fa fa-arrow-up"></span>
    </a>
    <!--*Scripts*-->
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.parallax-1.1.3.js')); ?>"></script>    
    <script src="<?php echo e(asset('js/jquery.fancybox.pack.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.nav.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom-magnificpopup.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom-nav.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.appear.js')); ?>"></script>
    <script src="<?php echo e(asset('js/isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.countTo.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-modal-video.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom-modalvideo.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="https://app.rocketbots.io/facebook/chat/plugin/19277/139498593154415" async></script>

</body>
</html><?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/frontend/template.blade.php ENDPATH**/ ?>
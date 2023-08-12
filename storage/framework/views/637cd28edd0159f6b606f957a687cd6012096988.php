
<?php $__env->startSection('css'); ?>
    <style>
        .color:hover {
            background-color: yellow;
            padding: 10px;
        }

        .noticelink {
            background-color: yellowgreen;
            padding: 10px;
        }

        #blog_main_sec .post-detail_container .post-content .post-metadata li {
            font-size: 16px;
            line-height: 30px;
        }

        #blog_main_sec .post-detail_container .post-content {
            height: 100px;
        }

        .blog-post_wrapper {
            border-radius: 15px;
            -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 0px 5px rgba(0, 0, 0, 0);
            box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 0px 5px rgba(0, 0, 0, 0);
        }

        /*.blog-post_wrapper:focus {*/
        /*   background-color: red !important;*/
        /*}*/

        .post-content {
            margin-top: 30px;
            font-size: 18px;
        }

        .cardArea, .cardAreaSubject {
            cursor: pointer;
            color: #ffac00;
        }

        #cover-spin {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        #cover-spin::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: black;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
        #ebookList {
            height: 350px !important;
            overflow: scroll
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    User Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

<?php if(Auth::user()->is_kids == 1): ?>
<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="courseArea">
                <div class="row blog_post_sec">
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/ebook">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                            <b>eBook</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/change-password">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Change Password</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="courseArea">
                <div class="row blog_post_sec">
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/today-class">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                            <b>Today Classes</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/dictionary">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Dictionary</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                     <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="//dictionary-arabic">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Quranic Dictionary</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/video-lecture">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                            <b>Video Lecture</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12" id="courseArea">
                <div class="row blog_post_sec">

                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/lecture-sheet">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                            <b>Lecture Sheet</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="#">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Profile Setting</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/change-password">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Change Password</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                        <a href="/payment">
                            <div class="blog-post_wrapper cardArea">
                                <div class="blog-post-inner_wrapper">
                                    <div class="post-detail_container">
                                        <div class="post-content text-center">
                                        <b>Payment System</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function () {
            var cardArea = ".cardArea"
            $(cardArea).hover(function () {
                $(this).css("backgroundColor", 'black').fadeIn(200);
            }, function () {
                $(this).css("backgroundColor", 'white').fadeIn("slow");
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/users/dashboard.blade.php ENDPATH**/ ?>
<header id="inner-navigation">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- navbar start -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo pull-left">
                <h2><a href="https://iqsbd.com/"><img class="logo-img" src="<?php echo e(asset('public/images/logo-white.png')); ?>" alt=""><img
                                class="logo-img logo-black" src="<?php echo e(asset('public/images/logo-black.png')); ?>" alt=""></a></h2>
            </div>
            <div id="navbar" class="navbar-nav-wrapper pull-right">
                <ul class="nav navbar-nav navbar-right" id="responsive-menu">
                    <li><a href="<?php echo e(url('/about-us')); ?>"><?php echo e(__('About Us')); ?></a></li>
                    <li>
                        <a href="#">Courses <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li>
                                <a href="<?php echo e(url('/quran-teaching-course')); ?>"><?php echo e(__('Quran Teaching Course (Male)')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/quran-teaching-course')); ?>"><?php echo e(__('Quran Teaching Course (Female)')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/arabic-language-teaching-course')); ?>"><?php echo e(__('Arabic Language Teaching Course (Male)')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/arabic-language-teaching-course')); ?>"><?php echo e(__('Arabic Language Teaching Course (Female)')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/arabic-language-teaching-course')); ?>"><?php echo e(__('Arabic Language Course For School Going Students')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/hifjul-quran')); ?>"><?php echo e(__('Hifzul Quran for school going students')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/quran-teaching-course')); ?>"><?php echo e(__('Quran Education  for school going students')); ?> </a>
                            </li>
                        <!--
                            <li><a href="<?php echo e(url('/quran-teaching-course')); ?>"><?php echo e(__('Quran Teaching Course')); ?> </a></li>
                            <li><a href="<?php echo e(url('/arabic-language-teaching-course')); ?>"><?php echo e(__('Arabic Language Teaching Course')); ?></a></li>
                            <li><a href="<?php echo e(url('/hifjul-quran')); ?>"><?php echo e(__('Hifjul Quran')); ?> </a></li>
                            <li><a href="<?php echo e(url('/pre-hifz')); ?>"><?php echo e(__('Pre-Hifz')); ?> </a></li>
                            <li><a href="<?php echo e(url('/kaidah')); ?>"><?php echo e(__('Kaidah')); ?></a></li>
                            <li><a href="<?php echo e(url('/amparra')); ?>"><?php echo e(__('Amparra')); ?></a></li>
                            <li><a href="<?php echo e(url('/najerah')); ?>"><?php echo e(__('Najerah')); ?> </a></li>
                           -->
                        </ul>
                    </li>
                    <li>
                        <a href="#">E-learn <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="<?php echo e(url('/today-class')); ?>"><?php echo e(__('Today class')); ?></a></li>
                            <li><a href="<?php echo e(route('wordbook')); ?>"><?php echo e(__('Dictionary')); ?></a></li>
                            <li><a href="<?php echo e(route('dictionary.arabic')); ?>"><?php echo e(__('Quranic Dictionary')); ?></a></li>
                            <li><a href="<?php echo e(url('/ebook')); ?>"><?php echo e(__('E-book')); ?></a></li>
                            <li><a href="<?php echo e(url('/exam')); ?>"><?php echo e(__('Exam')); ?></a></li>
                            <li><a href="<?php echo e(route('result')); ?>"><?php echo e(__('Result')); ?></a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Gallery <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="<?php echo e(route('audio')); ?>"><?php echo e(__('Audio Tilawat ')); ?></a></li>
                            <li><a href="<?php echo e(url('/video-lecture')); ?>"><?php echo e(__('Video Lecture')); ?></a></li>
                            <li><a href="<?php echo e(url('/lecture-sheet')); ?>"><?php echo e(__('Lecture Sheet')); ?></a></li>
                            <li><a href="<?php echo e(url('/gallery')); ?>"><?php echo e(__('Image')); ?></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Apply<i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="<?php echo e(route('admission.form')); ?>"><?php echo e(__('Admission Form')); ?></a></li>
                            <li><a href="<?php echo e(route('payment')); ?>"><?php echo e(__('Online Payment')); ?></a></li>
                            <li><a href="<?php echo e(route('pledge')); ?>"><?php echo e(__('Pledge Form')); ?></a></li>
                            <?php if(Auth::check()): ?>
                                <li><a href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                <li><a href="<?php echo e(url('/change-password')); ?>"><?php echo e(__('Change Your Password')); ?></a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    
                    <li><a href="<?php echo e(url('/contact-us')); ?>"><?php echo e(__('Contact')); ?></a></li>
                    <li><a style="color:#ffac00;" href="<?php echo e(url('/notice')); ?>"><?php echo e(__('Notice')); ?></a></li>
                    <?php if(Auth::check()): ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?> (<?php echo e(Auth::user()->name); ?>)
                            </a>
                        </li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                              style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('register.form')); ?>"><?php echo e(__('Register')); ?></a></li>
                        <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(__('Log In')); ?></a></li>
                    <?php endif; ?>

                </ul>
            </div><!--/.nav-collapse -->
            <a href="<?php echo e(url('/login')); ?>" id="responsiveLoginBtn" class="pull-right"><?php echo e(__('Log In')); ?></a>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
    <!-- navbar end -->
</header>
<style>
    #responsiveLoginBtn{
        display: none;
    }
    @media (max-width: 991px){
        #responsiveLoginBtn{
            display: block;
            position: relative;
            color: orange;
            border: solid teal 1px;
            padding: 2px 9px;
            border-radius: 5px;top: 20px;
            right: 47px;
            font-size: 12px;
            font-weight: bold;
        }
    }
</style><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/header.blade.php ENDPATH**/ ?>
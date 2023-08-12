<header id="inner-navigation">
    <!-- navbar start -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo pull-left">
                <h2><a href="<?php echo e(url('/')); ?>"><img  class="logo-img" src="images/logo-white.png" alt=""><img class="logo-img logo-black" src="images/logo-black.png" alt=""></a></h2>
            </div>
            <div id="navbar" class="navbar-nav-wrapper pull-right">
                <ul class="nav navbar-nav navbar-right" id="responsive-menu">
                    <li class=""><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li><a href="<?php echo e(url('/about-us')); ?>"><?php echo e(__('About Us')); ?></a></li>
                    <li>
                        <a href="#">Courses <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="<?php echo e(url('/adult-quranic-shikkha')); ?>"><?php echo e(__('Adult Quranic shikkha')); ?> </a></li>
                            <li><a href="<?php echo e(url('/arabic-shikkha')); ?>"><?php echo e(__('Arabic Shikkha')); ?></a></li>  
                            <li><a href="<?php echo e(url('/hifjul-quran')); ?>"><?php echo e(__('Hifjul Quran')); ?> </a></li>
                            <li><a href="<?php echo e(url('/kaidah')); ?>"><?php echo e(__('Kaidah')); ?></a></li>
                            <li><a href="<?php echo e(url('/amparra')); ?>"><?php echo e(__('Amparra')); ?></a></li> 
                            <li><a href="<?php echo e(url('/najerah')); ?>"><?php echo e(__('Najerah')); ?> </a></li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#">Gallery <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="<?php echo e(url('/gallery')); ?>"><?php echo e(__('Image')); ?></a></li>                           
                            <li><a href="<?php echo e(url('/audio-lecture')); ?>"><?php echo e(__('Audio Lecture')); ?> </a></li>
                            <li><a href="<?php echo e(url('/video-lecture')); ?>"><?php echo e(__('Video Lecture')); ?></a></li>                                
                        </ul>
                    </li>
                    <li><a href="<?php echo e(url('/blog')); ?>"><?php echo e(__('Blog')); ?></a></li>
                    <li>
                        <a href="#">Apply<i class="fa fa-angle-down"></i></a>
                        <ul>                           
                            <li><a href="<?php echo e(route('register.form')); ?>"><?php echo e(__('Register / Log In')); ?></a></li>
                            <?php if(auth()->guard()->check()): ?>
                                <li>
                                   <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>   
                            <?php endif; ?>                    
                        </ul>
                    </li>                    
                    <li><a href="<?php echo e(url('/contact-us')); ?>"><?php echo e(__('Contact')); ?></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
    <!-- navbar end -->
</header>
<?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/frontend/header.blade.php ENDPATH**/ ?>
<div class="dashboard-sticky-nav">
    <div class="content-left pull-left">
        <h2><a href="<?php echo e(url('/')); ?>" target="_blank" class="white">IQS-BD</a></h2>
    </div>

    <div class="content-right pull-right">

        <div class="search-bar">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="search" placeholder="Search Now">
                    <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                </div>
            </form>
        </div>

        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile-sec">
                    <div class="dash-image">
                        <img src="<?php echo e(asset('images/admin.png')); ?>" alt="">
                    </div>
                    <div class="dash-content">
                        <h4><?php echo e(Auth::user()->name); ?></h4>
                        <span><?php echo e(Auth::user()->is_admin == 1 ? 'Admin' : 'User'); ?></span>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="sl sl-icon-lock"></i><?php echo e(__('Change Password')); ?></a></li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="sl sl-icon-power"></i><?php echo e(__('Logout')); ?>

                    </a>
                </li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </ul>
        </div>

        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="dropdown-item">
                    <i class="sl sl-icon-envelope-open"></i>
                    <span class="notify">3</span>
                </div>
            </a>
            <div class="dropdown-menu notification-menu">
            <h4> 23 Messages</h4>
            <ul>
                <li>
                    <a href="#">
                        <div class="notification-item">
                            <div class="notification-content">
                                <p>You have a notification.</p><span class="notification-time">2 hours ago</span>
                            </div>
                        </div>
                    </a>
                </li>
             
            </ul>
            
            <p class="all-noti"><a href="#">See all messages</a></p>
            </div>
        </div>

        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="dropdown-item">
                    <i class="sl sl-icon-bell"></i>
                    <span class="notify"> 4 </span>
                </div>
            </a>
            <div class="dropdown-menu notification-menu">
                <h4> 4 Notifications</h4>
                <ul>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                 
                </ul>
                <p class="all-noti"><a href="#">See all notifications</a></p>
            </div>
        </div>

    </div>
    
</div>

<?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/backend/layouts/header.blade.php ENDPATH**/ ?>
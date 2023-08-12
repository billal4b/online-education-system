<div class="dashboard-sticky-nav">
    <div class="content-left pull-left">
        <h2><a href="<?php echo e(url('/')); ?>" target="_blank" class="white">IQS-BD</a></h2>
    </div>
    <div class="content-right pull-right">
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile-sec">
                    <div class="dash-image">
                        <img src="<?php echo e(asset('public/images/profile')); ?>/<?php echo e(Auth::user()->image); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                    </div>
                    <div class="dash-content">
                        <h4><?php echo e(Auth::user()->name); ?></h4>
                        <span><?php echo e(Auth::user()->is_admin == 1 ? 'Admin' : 'User'); ?></span>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo e(route('admin.profile')); ?>"><i class="sl sl-icon-user"></i> <?php echo e(__('Your Profile')); ?></a></li>
                <li><a href="<?php echo e(route('admin.password')); ?>"><i class="sl sl-icon-lock"></i><?php echo e(__('Change Password')); ?></a></li>
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
    </div>
    
</div>

<?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/layouts/header.blade.php ENDPATH**/ ?>
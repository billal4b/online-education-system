<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            <li class=""><a href="<?php echo e(route('user.dashboard')); ?>"><i class="sl sl-icon-settings"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li class=""><a href="<?php echo e(route('user.profile')); ?>"><i class="sl sl-icon-user"></i><?php echo e(__('Your Profile')); ?> </a></li>
            <li class=""><a href="<?php echo e(route('user.payment')); ?>"><i class="sl sl-icon-basket"></i> <?php echo e(__('Payment')); ?></a></li>
            
            <?php if(Auth::user()->is_kids == 1): ?> 
                <li class=""><a href="<?php echo e(route('ebook')); ?>"><i class="sl sl-icon-book-open"></i> <?php echo e(__('eBook')); ?></a></li>
                <li class=""><a href="<?php echo e(route('result')); ?>"><i class="sl sl-icon-speech"></i> <?php echo e(__('Result')); ?></a></li>
            <?php else: ?>
                <li class=""><a href="<?php echo e(route('todayclass')); ?>"><i class="sl sl-icon-camrecorder"></i> <?php echo e(__('Today Class')); ?></a></li>
                <li class=""><a href="<?php echo e(route('wordbook')); ?>"><i class="sl sl-icon-book-open"></i> <?php echo e(__('Dictionary')); ?></a></li>
                <li class=""><a href="<?php echo e(route('dictionary.arabic')); ?>"><i class="sl sl-icon-book-open"></i> <?php echo e(__('Arabic Dictionary')); ?></a></li>
                <li class=""><a href="<?php echo e(route('user.pdf')); ?>"><i class="sl sl-icon-doc"></i> <?php echo e(__('Lecture Sheet')); ?></a></li>
            <?php endif; ?>
            <li class=""><a href="<?php echo e(route('audio')); ?>"><i class="sl sl-icon-volume-1"></i> <?php echo e(__('Audio Lecture')); ?></a></li>
            <li class=""><a href="<?php echo e(route('user.video')); ?>"><i class="sl sl-icon-camera"></i> <?php echo e(__('Video Lecture')); ?></a></li>
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

<?php /**PATH /home2/iqsbdcom/public_html/resources/views/userend/layouts/navbar.blade.php ENDPATH**/ ?>
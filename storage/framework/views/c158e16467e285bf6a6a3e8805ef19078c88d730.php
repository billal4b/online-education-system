<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            <li class="active"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="sl sl-icon-settings"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a href="<?php echo e(route('admin.user')); ?>"><i class="sl sl-icon-user"></i><?php echo e(__('Users')); ?></a></li>    
            <li><a href="<?php echo e(route('admin.blog')); ?>"><i class="sl sl-icon-folder"></i> Blog</a></li>    
            <li>
                <a><i class="sl sl-icon-list"></i><?php echo e(__('Section')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>                    
                    <li><a href="<?php echo e(route('admin.section')); ?>"><?php echo e(__('Page Section')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.content')); ?>"><?php echo e(__('Page Content')); ?></a></li>
                </ul>
            </li>           
            <li>
                <a><i class="sl sl-icon-camera"></i><?php echo e(__('Media')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.image')); ?>"><?php echo e(__('Images')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.media')); ?>"><?php echo e(__('Audio/Video')); ?></a></li>
                </ul>
            </li>
            <li>
                <a><i class="sl sl-icon-layers"></i><?php echo e(__('Courses')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.course')); ?>"><?php echo e(__('Course Name')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.course.details')); ?>"><?php echo e(__('Course Details')); ?></a></li>
                </ul>
            </li>                   
            <li><a href="<?php echo e(route('admin.contact')); ?>"><i class="sl sl-icon-envelope-open"></i> Contact</a></li>  
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
<?php /**PATH D:\xampp\htdocs\virtual\iqs-bd\resources\views/backend/layouts/navbar.blade.php ENDPATH**/ ?>
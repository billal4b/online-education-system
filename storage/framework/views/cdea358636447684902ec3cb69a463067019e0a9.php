<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            <li class="<?php echo e(Request::segment(2) == 'dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="sl sl-icon-settings"></i><?php echo e(__('Dashboard')); ?> </a></li>


            <li class="<?php echo e(Request::segment(2) == 'user' ? 'active' : '' | ( Request::segment(2) == 'admitted-user' ? 'active' : '') | ( Request::segment(2) == 'pledge-user' ? 'active' : '')); ?>">
                <a><i class="sl sl-icon-user"></i><?php echo e(__('Users')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.user')); ?>"><?php echo e(__('Registered User')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.admitted.user')); ?>"><?php echo e(__('Admitted User')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.pledge.user')); ?>"><?php echo e(__('Pledge User')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Request::segment(2) == 'payment' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.payment')); ?>"><i class="sl sl-icon-basket"></i> Payment</a></li>
            <li class="<?php echo e(Request::segment(2) == 'today-class' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.todayclass')); ?>"><i class="sl sl-icon-graduation"></i>Today Class</a></li>
           

            <li class="<?php echo e(Request::segment(2) == 'image' ? 'active' : '' | ( Request::segment(2) == 'media' ? 'active' : '') | ( Request::segment(2) == 'audio' ? 'active' : '') | ( Request::segment(2) == 'pdf' ? 'active' : '')); ?>">
                <a><i class="sl sl-icon-camera"></i><?php echo e(__('Media')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.audio')); ?>"><?php echo e(__('Audio')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.pdf')); ?>"><?php echo e(__('PDF')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.media')); ?>"><?php echo e(__('Video')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.image')); ?>"><?php echo e(__('Image')); ?></a></li>
                </ul>
            </li>
          <li class="<?php echo e(Request::segment(2) == 'wordbook' ? 'active' : '' | ( Request::segment(2) == 'ebook' ? 'active' : '') | ( Request::segment(2) == 'arabic-dictionary' ? 'active' : '') | ( Request::segment(2) == 'question' ? 'active' : '') | ( Request::segment(2) == 'exam' ? 'active' : '') | ( Request::segment(2) == 'result' ? 'active' : '')); ?>">
                <a><i class="sl sl-icon-book-open"></i><?php echo e(__('E-learn')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.ebook')); ?>"><?php echo e(__('E-book')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.wordbook')); ?>"><?php echo e(__('Dictionary')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.arabic-dictionary')); ?>"><?php echo e(__('Arabic Dictionary')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.question')); ?>"><?php echo e(__('Question')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.exam')); ?>"><?php echo e(__('Exam')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.result')); ?>"><?php echo e(__('Result')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Request::segment(2) == 'notice' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.notice')); ?>"><i class="sl sl-icon-bubbles"></i> Notice</a></li>

            <li class="<?php echo e(Request::segment(2) == 'blog' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.blog')); ?>"><i class="sl sl-icon-folder"></i> Blog</a></li>
            <li class="<?php echo e(Request::segment(2) == 'course' ? 'active' : '' | ( Request::segment(2) == 'course-details' ? 'active' : '')); ?>">
                <a><i class="sl sl-icon-layers"></i><?php echo e(__('Courses')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.course')); ?>"><?php echo e(__('Course Name')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.course.details')); ?>"><?php echo e(__('Course Details')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Request::segment(2) == 'section' ? 'active' : '' | ( Request::segment(2) == 'content' ? 'active' : '')); ?>">
                <a><i class="sl sl-icon-list"></i><?php echo e(__('Section')); ?><span class="slicknav_arrow"><i class="sl sl-icon-plus"></i></span></a>
                <ul>
                    <li><a href="<?php echo e(route('admin.section')); ?>"><?php echo e(__('Page Section')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.content')); ?>"><?php echo e(__('Page Content')); ?></a></li>
                </ul>
            </li>

            <li class="<?php echo e(Request::segment(2) == 'contact' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.contact')); ?>"><i class="sl sl-icon-phone"></i> Contact</a></li>
            <li class="<?php echo e(Request::segment(2) == 'backup' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.backup')); ?>"><i class="sl sl-icon-arrow-down-circle"></i> Backups</a></li>
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

<?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/layouts/navbar.blade.php ENDPATH**/ ?>
<section class="features-one">
    <div class="container">
        <div class="inner-heading">
            <h3>Featured courses</h3>
            <h2>Various courses to choose from</h2>
        </div>

        <div class="row slider slider-ft-course">

            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <div class="feat-img">
                            <img src="public/images/courses/<?php echo $course->image; ?>" alt="">
                            <div class="th-name">
                                <h4><?php echo $course->course_name; ?></h4>
                            </div>
                            <div class="overlayPort">
                                <ul class="info text-center list-inline">
                                    <li>
                                        <a href="<?php echo $course->url; ?>">View Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div><!-- /.container -->       
</section><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/pages/courses.blade.php ENDPATH**/ ?>
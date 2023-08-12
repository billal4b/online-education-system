
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .inner-heading h2 span { color: #fc7f0c;}
    h4 { font-size: 20px; }
    .video_title { margin-right: 10px; text-align: center; margin: 10px;}
    .video_title p { margin-bottom: 10px; }
    .pulses { top: 5em; left: 1em;}

    .page section.section-inner { padding: 0 0 20px!important;  }
    .padding-top { padding-top: 40px;}
    .inner-heading h3 { text-align: center; padding-top: 40px;}
    .inner-heading h3:before { background: none; }
    .paddding-bottom { }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Today Classes <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>


<section>
    <div class="container">
        <form action="<?php echo e(route('todayclass')); ?>" method="get" autocomplete="off">
            <div class="row padding-top">
                <div class="col-md-2 col-sm-12 col-xs-12"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <select name="course_id" id="course_id">
                        <?php $__currentLoopData = $select_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(@$courseId == $k): ?>
                                <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <button class="mt_btn_yellow" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Start Quran Teaching Course -->
<section id="the-gallery" class="wide-gallery inner-gallery section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3><?php echo e($todC->courses->course_name); ?> (<?php echo e($gender); ?>)</span></h3>
        </div>
    </div>
</section>
<!-- new-->
<section id="mt_fun">
    <div class="container">
        <div class="inner-heading">
            <h2>Today Class</h2>
        </div>
        <div class="row facts_row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/<?php echo e($todC->video_url_id); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <p><?php echo e($todC->video_title); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="features-one">
    <div class="container">
        <div class="inner-heading">
            <h3>Previus Classes</h3>
        </div>

        <div class="row slider slider-ft-course">

            <?php $__currentLoopData = $preC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="featured-item">
                        <!-- new -->
                        <div class="feat-img">
                            <!-- 4:3 aspect ratio -->
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/<?php echo e($course->video_url_id); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>

                            <div class="video_title">
                                <p><?php echo $course->video_title; ?></p>
                                <p> <strong>Course: </strong> <?php echo $course->courses->course_name; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div><!-- /.container -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/today/today_class_common.blade.php ENDPATH**/ ?>
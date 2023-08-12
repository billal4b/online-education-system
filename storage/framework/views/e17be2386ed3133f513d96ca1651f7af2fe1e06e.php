
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .inner-heading h2 span { color: #fc7f0c;}
    h4 { font-size: 20px; }
    .video_title { margin-right: 10px; text-align: center; margin: 10px;}
    .video_title p { margin-bottom: 10px; }
    .pulses { top: 5em; left: 1em; }
    .page section.section-inner { padding: 20px 0 20px!important; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Today Classes <?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

    <!--School Going Students -->
    <section id="the-gallery" class="wide-gallery inner-gallery section-inner">
        <div class="container">
            <div class="inner-heading">
                <h3><?php echo e($todC->courses->course_name); ?></span></h3>
            </div>
        </div>
    </section>

        <section id="mt_fun">
            <div class="container">
                <div class="inner-heading">
                    <h2>Today Class</h2>
                </div>
                <div class="row facts_row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/<?php echo e($todC->video_url_id); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <p><?php echo e($todC->video_title); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!--* End Fun And Facts*-->
        <section class="features-one">
            <div class="container">
                <div class="inner-heading">
                    <h3>Previus Classes</h3>
                </div>

                <div class="row slider slider-ft-course">

                    <?php $__currentLoopData = $preC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="col-md-4 col-sm-6 col-xs-12 item">
                    	<div class="featured-item">
                    		<div class="feat-img">
                    			<div class="embed-responsive embed-responsive-4by3">
                    				<iframe class="embed-responsive-item" width="500" height="300" src="https://www.youtube.com/embed/<?php echo e($course->video_url_id); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    			</div>
                    			<div class="video_title">
                    				<p><?php echo $course->video_title; ?></p>
                    				<p><strong>Course: </strong> <?php echo $course->courses->course_name; ?></p>
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

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/pages/today/today_class_children.blade.php ENDPATH**/ ?>
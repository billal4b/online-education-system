

<?php $__env->startSection('title'); ?>
    Audio lecture
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

 <!--* Events*-->
 <section class="edu-events section-inner">
    <div class="container">
        <!-- section title -->
        <div class="inner-heading">
            <h3>Audio lecture</h3>
            <h2>Reserve your Audio class now</h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $audios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-sm-12">
                    <div class="event-item">
                        <div class="event-date text-center text-uppercase">
                            <h4 class="mar-0"><span>mp3</span></h4>                                
                        </div> 
                        <div class="event-details">
                            <h3 class="mar-bottom-10"><a href="#"><?php echo e($audio->title); ?></a></h3>
                            <ul class="event-time">
                                <li><i class="fa fa-map-marker"></i><?php echo e($audio->course_title); ?></li>
                            </ul>
                            <audio controls>
                                <source src="public/audio/<?php echo e($audio->audio_local); ?>" type="audio/ogg">
                                <source src="public/audio/<?php echo e($audio->audio_local); ?>" type="audio/mpeg">
                                <source src="public/audio/<?php echo e($audio->audio_local); ?>" type="audio/wav">
                                <source src="public/audio/<?php echo e($audio->audio_local); ?>" type="audio/m4a">
                            </audio>
                        </div>
                    </div>
                </div>                  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-sm-12">
                <?php echo $audios->links(); ?>

            </div>
        </div><!-- /.row -->
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/audio.blade.php ENDPATH**/ ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Videos lecture
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

<section id="blog_main_sec" class="grid-view section-inner">
    <div class="container">
     
        <div class="inner-heading">
            <h3>Video lecture </h3>
            
        </div>
        
        <div class="row">
            <!--*Blog Content Sec*-->
            
            <div class="col-md-12">
                <div class="row blog_post_sec">   

                    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                   
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item" id="tbody">
                        <div class="blog-post_wrapper">
                            <div class="blog-post-inner_wrapper">
                                <div class="blog-post-image">
                                    <div class="clearfix">
                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                                            <iframe class="embed-responsive-item" src="<?php echo $video->video; ?>" style="height: 101%"
                                              allowfullscreen></iframe>
                                          </div>
                                    </div>
                                </div>
                                <div class="post-detail_container">
                                    <div class="post-content">
                                        <h3 class="post-title entry-title">
                                            <?php echo e($video->title); ?>

                                        </h3>     
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  

            </div>
            <!--* End Blog Content Sec*-->           
        </div>
          <?php echo $videos->links(); ?>

    </div>

</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/video.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title'); ?>
    About Us
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>
    <?php $__currentLoopData = $aboutUs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
        <!--*About*-->
        <section id="mt_about body-color">
            <div class="container">
                <div class="about_services">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="about-items">
                                <div class="inner-heading">
                                    <h3><?php echo $item->title; ?></h3>
                                </div>
                                <p> <?php echo $item->content; ?> </p>
                            </div>
                        </div>                    
                    </div>                    
                </div>
            </div>
        </section>
        <!--*EndAbout*-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/about_us.blade.php ENDPATH**/ ?>
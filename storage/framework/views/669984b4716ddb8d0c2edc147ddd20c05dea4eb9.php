<?php $__env->startSection('title'); ?>
    Gallery
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

    <!-- Gallery -->
    <section id="the-gallery" class="wide-gallery inner-gallery section-inner">
        <div class="container">
            <!-- section title -->
            <div class="inner-heading">
                <h3>Gallery</h3>
            </div>

            <div class="row ge_second">
                <?php $__currentLoopData = $galleryImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-4 mix" >
                        <div class="item port-popup">
                            <a href="public/images/banner/<?php echo $image->image_name; ?>" title="">
                                <img src="public/images/banner/<?php echo $image->image_name; ?>" alt="">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>                    
                    </div>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
    <!-- End Gallery -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/gallery.blade.php ENDPATH**/ ?>
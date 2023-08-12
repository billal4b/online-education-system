<!-- Paradise Slider -->
<div id="fw_al_009" class="carousel slide ps_control_sbo swipe_x ps_easeOutInCubic" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        
        <div class="item active" style="background:url('public/images/banner.jpg'); background-size:cover;background-position:center;">
            <!-- Slide Background -->
            
            <div class="overlay"></div>
        </div>
           
        <?php $__currentLoopData = $sliderImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Second Slide -->
        <div class="item" style="background:url('public/images/banner/<?php echo e($slider->image_name); ?>'); background-size:cover;background-position:center;">
            <!-- Slide Background -->
          
            <div class="overlay"></div>
        </div>
        <!-- End of Slide -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
    </div><!-- End of Wrapper For Slides -->
    
    <!-- Left Control -->
    <a class="left carousel-control" href="#fw_al_009" role="button" data-slide="prev">
        <span class="fa fa-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <!-- Right Control -->
    <a class="right carousel-control" href="#fw_al_009" role="button" data-slide="next">
        <span class="fa fa-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    <!-- End Paradise Slider -->
<?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/template_slider.blade.php ENDPATH**/ ?>
<?php if(!is_null($hifjulQuranMale)): ?>

    <?php $__env->startSection('title'); ?>
        <?php echo $hifjulQuranMale->course_name; ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>  

    <?php $__env->startSection('pages'); ?>
       <!--*Features-one*-->
    <section class="features-one"><br/>
    <?php if(!is_null($hifjulQuranMale)): ?>
        <div class="container">
            <div class="row">                
                <div class="col-xs-12">                
                        <?php echo $hifjulQuranMale->course_details; ?>               
                </div>
            </div>
            <div class="row">  
                <div class="col-xs-12">
                    <?php echo $hifjulQuranMale->course_details_bd; ?>

                </div>
            </div>             
        </div><br/>
    <?php endif; ?>  
        <?php echo $__env->make('frontend.pages.courses.salah_and_prayer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
    </section>
    
    
    <?php echo $__env->make('frontend.pages.courses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/pages/courses/hifjul_quran_male.blade.php ENDPATH**/ ?>
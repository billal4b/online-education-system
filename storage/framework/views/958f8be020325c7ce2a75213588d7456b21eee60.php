
<?php $__env->startSection('css'); ?>
<style>
    .color:hover {       
        background-color: yellow;
        padding: 10px;
    }
    .noticelink {
        background-color: yellowgreen;
        padding: 10px;
    }
    .post-content {
        height: 250px;
    }
</style>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('title'); ?> Results <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>

<section id="blog_main_sec" class="grid-view section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3> Exam Results</h3>
        </div>
        <div class="row">
            <!--*Blog Content Sec*-->
            <div class="col-md-12">
                <div class="row blog_post_sec">   

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item">
                        <div class="blog-post_wrapper">
                            <div class="blog-post-inner_wrapper">
                                <div class="post-detail_container">
                                    <div class="post-content">
                                        
                                        <h3><?php echo e($result->course_title); ?></h3>
                                        <strong> <?php echo e($result->exam_name); ?></strong>
                                        <p><?php echo e($result->subject_name); ?></p>      
                                         <strong class="noticelink">                    
                                            <a href="/public/result/<?php echo $result->pdf_file; ?>" target="_blank"> Please Click Here & see your result </a>
                                        </strong>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  

            </div>
            <!--* End Blog Content Sec*-->           
        </div>
        <?php echo $data->links(); ?>

    </div>
</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>   
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/frontend/pages/result.blade.php ENDPATH**/ ?>
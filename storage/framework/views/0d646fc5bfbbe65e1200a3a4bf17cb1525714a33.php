
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
</style>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('title'); ?> Notice <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <!--*Blog Content Sec*-->
            <div class="col-md-8 col-sm-12">
                <div class="post_img">
                    <img src="images/blog-listing/blog_05.jpg" alt="">
                </div>
                <div class="post_title">
                    <h3><?php echo e($lastnotice->title); ?></h3>
                    <ul class="list-inline list-unstyled">
                        
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; <?php echo date('d-m-Y', strtotime($lastnotice->publish_at)); ?>&nbsp; 
                        </li>
                      
                    </ul>
                </div>
                <div class="post_body">
                    <?php echo $lastnotice->content; ?>

                </div>  
                <br>
                <?php if($lastnotice->file != ''): ?>
                <strong class="noticelink">                    
                    <a href="/public/notice/<?php echo $lastnotice->file; ?>" target="_blank"> Please Click Here </a>
                </strong>  
                <?php endif; ?>      
            </div>

            <aside class="col-md-4 col-sm-12">   
                <div class="widget widget_recent_entries"><!-- widget list -->
                    <h3 class="blog_heading_border"> Recent Notices </h3>

                    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <ul>
                        <li>
                            <h4>
                                <a class='color' href="<?php echo e(route('notice.post', $notice->slug)); ?>"><?php echo $notice->title; ?></a>
                            </h4>
                            <p><?php echo date('d-m-Y', strtotime($notice->publish_at)); ?></p>
                        </li>                                           
                    </ul><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </aside>
            <!--* End Blog Sidebar*-->
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/notice.blade.php ENDPATH**/ ?>
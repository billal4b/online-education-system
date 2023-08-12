
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
     table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        text-align: center;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Lecture Sheet <?php $__env->stopSection(); ?>
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
                    <h3><?php echo e($pdfDetails->title); ?></h3>
                    <strong><?php echo e($pdfDetails->courses->course_name); ?></strong>
                    <ul class="list-inline list-unstyled">
                        <li>
                            <i class="ion-ios-calendar-outline"></i>&nbsp; <?php echo date('d-m-Y', strtotime($pdfDetails->created_at)); ?>&nbsp;
                        </li>
                    </ul>
                </div>
                <div class="post_body">
                    <?php echo $pdfDetails->content; ?>

                </div>
                <br>
                <?php if($pdfDetails->pdf_file != ''): ?>
                <strong class="noticelink">
                    <a href="/public/pdf/<?php echo $pdfDetails->pdf_file; ?>" target="_blank"> Please Click Here </a>
                </strong>
                <?php endif; ?>
            </div>
            <aside class="col-md-4 col-sm-12">
                <div class="widget widget_recent_entries"><!-- widget list -->
                    <h3 class="blog_heading_border"> Recent Post </h3>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul>
                        <li>
                            <h4>
                                <a class='color' href="<?php echo e(route('pdf.singlePost', $file->slug)); ?>"><?php echo $file->title; ?></a>
                            </h4>
                            <p><?php echo $file->courses->course_name; ?></p>
                            <p><?php echo date('d-m-Y', strtotime($file->created_at)); ?></p>
                        </li>
                    </ul><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php echo $data->links(); ?>

            </aside>
            <!--* End Blog Sidebar*-->
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/pdfDetails.blade.php ENDPATH**/ ?>
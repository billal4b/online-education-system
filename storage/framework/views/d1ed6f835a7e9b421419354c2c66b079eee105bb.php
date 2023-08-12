
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
    #blog_main_sec .post-detail_container .post-content .post-metadata li {
        font-size: 16px;
        line-height: 30px;
    }
    #blog_main_sec .post-detail_container .post-content {
        min-height: 300px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> eBook <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <form action="<?php echo e(route('ebook.search')); ?>" method="GET">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <select name="section" id="section" class="form-control">
                        <option value="0">-- All --</option>
                        <option value="1">ইসলামিয়াত</option>
                        <option value="2">দুয়া</option>
                        <option value="3">এরাবিক</option>
                        <option value="4">অন্যন্য</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-danger">Filter</button>
                </div>
            </form>
            <div class="col-sm-12">
                <div class="row blog_post_sec">
                    <?php if($ebookSearch->isNotEmpty()): ?>
                        <?php $__currentLoopData = $ebookSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 grid-item">
                                <div class="blog-post_wrapper">
                                    <div class="blog-post-inner_wrapper">
                                        <div class="post-detail_container">
                                            <div class="post-content">
                                                <h4 class="post-title entry-title">
                                                    <a href="<?php echo e(route('ebook.post', $ebook->slug)); ?>"><?php echo $ebook->course_title; ?></a>
                                                </h4>
                                                <ul class="list-unstyled list-inline post-metadata icon-text-size">
                                                    <li><i class="ion-ios-book-outline"></i>&nbsp;<?php echo $ebook->subject; ?></li><br>
                                                    <li><i class="ion-ios-book-outline"></i>&nbsp;<?php echo $ebook->subject_code; ?></li><br>
                                                    <li><i class="ion-ios-stopwatch-outline"></i>&nbsp; <?php echo date('d-m-Y', strtotime($ebook->created_at)); ?></li>
                                                </ul>
                                                <div class="view_detail">
                                                    <a href="<?php echo e(route('ebook.post', $ebook->slug)); ?>" class="mt_btn_yellow">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item">
                            <h3>No data found</h3>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo $ebookSearch->links(); ?>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/ebook_search.blade.php ENDPATH**/ ?>
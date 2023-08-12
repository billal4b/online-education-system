<?php $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <u><a href="#" class="topic_link" data-ebookId="<?php echo e($ebook['id']); ?>"><?php echo e($ebook['topic']); ?></a></u>
    <br>
    <small class="pull-right publish_date"><?php echo e(date('d/m/Y h:i A',strtotime($ebook['publish_time']))); ?></small>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<style>
    .publish_date {
        font-size: 11px;
        color: #FF9800;
    }

    .topic_link {
        font-size: 14px;
    }
</style>
<?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/ebookListDateRange.blade.php ENDPATH**/ ?>
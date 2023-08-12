<?php if(count($ebook)): ?>
    <small style="color: #FF9800">
        <i class="ion-ios-calendar-outline"></i> <?php echo e(date('d/m/Y h:i A',strtotime($ebook['publish_time']))); ?>

    </small>
    <br>
    <?php if($ebook['content_type'] == EBOOK_CONTENT || $ebook['content_type'] == EBOOK_BOTH): ?>
        <?php echo $ebook['content']; ?>

    <?php endif; ?>
    <?php if($ebook['content_type'] == EBOOK_DOCUMENT || $ebook['content_type'] == EBOOK_BOTH): ?>
        <a href="/public/ebook/<?php echo $ebook['document']; ?>" target="_blank">
                     <span class="input-group-addon glyphicon glyphicon-download" style="font-size: 30px;">
                     <span style="position: relative;top: -6px">
                         Download Document/File
                     </span>
                     </span>
        </a>
    <?php endif; ?>
    <style>
        .glyphicon-download:before {
            color: green;
        }
    </style>
<?php endif; ?>
<?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/ebookFilterContent.blade.php ENDPATH**/ ?>
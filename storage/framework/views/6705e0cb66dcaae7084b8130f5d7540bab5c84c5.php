<div class="row">
    
    <div class="col-md-8">
        <b><u>Topic:</u></b>
        <h4><span id="topicTitle" style="color: #FF9800"><?php echo e(@$ebooks[0]['topic']); ?></span></h4>
        <hr>
        
    </div>
    <div class="col-md-4">
        <h4>
            <?php if($subjectId == SYLLABUS): ?>
                Recent Syllabus
            <?php elseif($subjectId == ISLAMIAT): ?>
                Recent Islamiat
            <?php elseif($subjectId == DUA): ?>
                Recent Dua
            <?php elseif($subjectId == HOME_WORK): ?>
                Recent Homework
            <?php endif; ?>
        </h4>
        <form action="#" autocomplete="off">
            <div class="form-group has-success has-feedback">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon glyphicon glyphicon-calendar" style="position: relative;
    top: 0px;"></span>
                    <input type="text" class="form-control" id="dateRange" placeholder="Select Date Range">
                </div>
                <small class="pull-right" style="font-size: 11px;">Maximum 10 days</small>
            </div>

            <div class="form-group has-success has-feedback">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon glyphicon glyphicon-search" style="position: relative;
    top: 0px;"></span>
                    <select id="topicSelection" name="state"></select>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-8" id="contntArea">
        <?php if(count($ebooks)): ?>
            <small style="color: #FF9800">
                <i class="ion-ios-calendar-outline"></i> <?php echo e(date('d/m/Y h:i A',strtotime($ebooks[0]['publish_time']))); ?>

            </small>
            <br>
            <?php if($ebooks[0]['content_type'] == EBOOK_CONTENT || $ebooks[0]['content_type'] == EBOOK_BOTH): ?>
                <?php echo $ebooks[0]['content']; ?>

            <?php endif; ?>
            <?php if($ebooks[0]['content_type'] == EBOOK_DOCUMENT || $ebooks[0]['content_type'] == EBOOK_BOTH): ?>
                <a href="/public/ebook/<?php echo $ebooks[0]['document']; ?>" target="_blank">
                     <span class="input-group-addon glyphicon glyphicon-download" style="font-size: 30px;">
                     <span style="position: relative;top: -6px">
                         Download Document/File
                     </span>
                     </span>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-md-4" id="ebookList">

        <?php $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <u><a href="#" class="topic_link" data-ebookId="<?php echo e($ebook['id']); ?>"><?php echo e($ebook['topic']); ?></a></u>
            <br>
            <small class="pull-right publish_date"><?php echo e(date('d/m/Y h:i A',strtotime($ebook['publish_time']))); ?></small>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<style>
    .publish_date {
        font-size: 11px;
        color: #FF9800;
    }

    .topic_link {
        font-size: 14px;
    }
    .glyphicon-download:before {
        color: green;
    }
</style>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#dateRange').val('')
        }, 100)
        $('#topicSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Topic",
            ajax: {
                url: '<?php echo e(route('ebook.topic.search')); ?>',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
    })
</script>
<?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/ebookFilter.blade.php ENDPATH**/ ?>
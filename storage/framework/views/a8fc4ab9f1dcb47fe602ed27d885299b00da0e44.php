<?php $__env->startSection('css'); ?>
<style>
    .select2-selection.select2-selection--single{
        height: 40px !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <form action="<?php echo e(route('admin.arabic-dictionary')); ?>" method="get" autocomplete="off">
        <div class="col-md-4" style="padding-right: 0">
            <input type="hidden" id="lesson_no" name="lesson_no" value="<?php echo e(@$lesson_no); ?>">
            <select name="subject" id="subject" class="form-control">
                <option selected value="1"><?php echo e(@$lesson_no); ?></option>
            </select>
        </div>
        <div class="col-md-6" style="padding-right: 0">
            <input type="search" name="keyword" placeholder="Write text to search everywhere" id="topic_text" value="<?php echo e(@$keyword); ?>">
        </div>
        <div class="col-md-1" style="padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Arabic Word List <a href="<?php echo e(route('admin.arabic-dictionary.create')); ?>" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th width="20%">Bengali Word</th>
                            <th width="20%">Arabic Word</th>
                            <th width="20%">English Word</th>
                            <th width="15%">Lesson No</th>
                            <th width="10%" class="text-center">Total Used</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aDictionary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo $aDictionary->bengali_word; ?></td>
                            <td><?php echo $aDictionary->arabic_word; ?></td>
                            <td><?php echo $aDictionary->english_word; ?></td>
                            <td><?php echo $aDictionary->lesson_no; ?></td>
                            <td class="text-center"><?php echo $aDictionary->total_mentioned; ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.arabic-dictionary.edit', $aDictionary->id)); ?>" class="button">Edit</a>
                                <a href="<?php echo e(route('admin.arabic-dictionary.delete', $aDictionary->id)); ?>" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $data->links(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
    <script>
        $('#subject').select2({
            theme: "bootstrap",
            tags: true,
            allowClear: true,
            placeholder: 'Type Subject',
            minimumInputLength: 0,
            ajax: {
                url: '<?php echo e(route('dictionary.quarnic.subject.search')); ?>',
                dataType: 'json'
            }
        }).on('change', function (e) {
            let sub = $(this).find(":selected").text();
            $('#lesson_no').val(sub)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/arabic-dictionary/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
<style>
    table.basic-table td {
        padding: 10px;
    }
    tbody td a { color: #337ab7; text-decoration: underline; }
       .select2-container--bootstrap .select2-selection--single {
            height: 41px;
        }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <form action="<?php echo e(route('admin.media')); ?>" method="get" autocomplete="off">
        <div class="col-md-4" style="margin-left:20px;padding-left:0;padding-right: 0">
            <select name="course_id" id="course_id">
                <option value="" selected>Select Course</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(@$courseId == $k): ?>
                        <option value="<?php echo e($k); ?>" selected><?php echo e($v); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4" style="margin-left:20px;padding-left:0;padding-right:0;">
            <input type="hidden" name="title_text" id="title_text" value="<?php echo e(@$titleText); ?>">
            <select name="title" id="titleSelection">
                <?php if(@$titleKey != null): ?>
                    <option value="<?php echo e(@$titleKey); ?>" class="form-control" selected><?php echo e(@$titleText); ?></option>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-3" style="margin-left:20px;padding-left:0;padding-right: 0">
            <input value="Search" type="submit" style="height: 42px;padding: 6px;">
        </div>
    </form>
    <div class="col-lg-12 col-md-12 col-xs-12">
      
      <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Media List
              <a href="<?php echo e(route('admin.media.create')); ?>">
              <span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      <?php $i=1; ?>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $media->title; ?></td>
                          <td><?php echo $media->courses->course_name; ?></td>
                          <td><?php echo $media->order; ?></td>
                          <td><span class="<?php echo e($media->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $media->is_active == 1 ? 'Active' : 'Inactive'; ?></span></td>

                          <td>
                            <a href="<?php echo e(route('admin.media.edit', $media->id)); ?>" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>

                            <a href="<?php echo e(route('admin.media.delete', $media->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
<?php $__env->startSection('scripts'); ?><script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
<script>
    $(document).ready(function () {

        $('#titleSelection').select2({
            theme: "bootstrap",
            placeholder: "Search by Title",
            ajax: {
                url: '<?php echo e(route('admin.media.title.search')); ?>',
                dataType: 'json'
            },
            width: '100%',
            allowClear: true,
            minimumInputLength: 2
        });
        $('#titleSelection').change(function () {
            $('#title_text').val($('#titleSelection option:selected').text())
        })
    });

    // $(document).ready(function () {
    //  // load_data();
    //   function load_data(query='') {
    //     $.ajax({
    //       url:"<?php echo e(route('admin.media.search')); ?>",
    //       method: "POST",
    //       data:{
    //         "_token": "<?php echo e(csrf_token()); ?>",
    //         query:query
    //       },
    //       success:function(data) {
    //          //console.log(data);
    //         $('tbody').html(data);

    //       }
    //     })
    //   }

    //   $('#course_title').change(function(){
    //     $('#hidden_course').val($('#course_title').val());
    //     //console.log(this.value);
    //     var query = $('#hidden_course').val();
    //     load_data(query);
    //   });

    // });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/media/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('css'); ?>
    <style>
            tbody td a { color: #337ab7; text-decoration: underline; }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Notice List <a href="<?php echo e(route('admin.notice.create')); ?>" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Title</th>      
                            <th>Content</th>      
                            <th>Publish</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                        <tr>
                            <td><a href="<?php echo e(route('admin.notice.edit', $notice->id)); ?>"><?php echo $notice->title; ?></a></td>
                            <td><?php echo Str::limit($notice->content, 100); ?></td>
                            <td><?php echo $notice->publish_at; ?></td>
                            <td><span class="<?php echo e($notice->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $notice->is_active == 1 ? 'Publish' : 'Unpublish'; ?></span></td>
                            <td>
                                <a href="<?php echo e(route('admin.notice.show', $notice->id)); ?>" class="button gray"><i class="sl sl-icon-eye"></i></a>                            
                                <a href="<?php echo e(route('admin.notice.delete', $notice->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
                            </td>   
                        </tr>                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $notices->links(); ?>  
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/notice/index.blade.php ENDPATH**/ ?>
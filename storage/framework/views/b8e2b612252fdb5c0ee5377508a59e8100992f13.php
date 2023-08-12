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
            <h4 class="gray">Blog List <a href="<?php echo e(route('admin.blog.create')); ?>" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Title</th>      
                            <th>Excerpt</th> 
                            <th>Publish</th> 
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                        <tr>
                            <td><a href="<?php echo e(route('admin.blog.edit', $blog->id)); ?>"><?php echo $blog->title; ?></a></td>
                            <td><?php echo Str::limit($blog->excerpt, 100); ?></td>
                            <td><?php echo $blog->date_time; ?></td>
                            <td><img src="/public/images/blog/thumb/<?php echo $blog->thumb; ?>"> </td>
                            <td><span class="<?php echo e($blog->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $blog->is_active == 1 ? 'Publish' : 'Unpublish'; ?></span></td>
                            <td>
                                <a href="<?php echo e(route('admin.blog.show', $blog->id)); ?>" class="button gray"><i class="sl sl-icon-eye"></i></a>                            
                                <a href="<?php echo e(route('admin.blog.delete', $blog->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
                            </td>   
                        </tr>                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $blogs->links(); ?>  
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/blog/index.blade.php ENDPATH**/ ?>
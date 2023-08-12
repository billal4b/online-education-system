
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
            <h4 class="gray">Section Content List <a href="<?php echo e(route('admin.content.create')); ?>" ><span class="button gray">Add</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Section</<th>  
                            <th>Title</th>      
                            <th>Content</th> 
                            <th>Order</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                        <tr>
                            <td> <a href="<?php echo e(route('admin.content.edit', $content->id)); ?>"><?php echo $content->section_name; ?></a></td>
                            <td><?php echo $content->title; ?></td>
                            <td><?php echo Str::limit($content->content, 100); ?></td>
                            <td><?php echo $content->order; ?></td>
                            <td><span class="<?php echo e($content->is_active == 1 ? 'paid' : 'cancel'); ?> t-box"><?php echo $content->is_active == 1 ? 'Active' : 'Inactive'; ?></span></td>
                            <td>                            
                                <a href="<?php echo e(route('admin.content.show', $content->id)); ?>" class="button gray"><i class="sl sl-icon-eye"></i></a>
                                <a href="<?php echo e(route('admin.content.delete', $content->id)); ?>" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-trash"></i></a>
                            </td>   
                        </tr>                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                </table>
            </div>
        </div>     
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/contents/index.blade.php ENDPATH**/ ?>
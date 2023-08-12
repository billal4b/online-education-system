<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Notice <a href="<?php echo e(url()->previous()); ?>"><span class="button gray">Back</span></a></h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        
                        <tr>
                            <td><b>Title</b></td>
                            <td><?php echo $show->title; ?></td>                              
                        </tr>  
                        
                        <tr>
                            <td><b>Content</b></td>
                            <td><?php echo $show->content; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Slug</b></td>
                            <td><?php echo $show->slug; ?></td>                              
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td><?php echo $show->publish_at; ?></td>                              
                        </tr>      
                                       
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/notice/show.blade.php ENDPATH**/ ?>
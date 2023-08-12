<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="<?php echo e(route('admin.blog')); ?>" ><span class="button gray">List</span></a> </h4>    
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        
                        <tr>
                            <td><b>Title</b></td>
                            <td><?php echo $show->title; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Excerpt</b></td>
                            <td><?php echo $show->excerpt; ?></td>                              
                        </tr>
                        <tr>
                            <td><b>Content</b></td>
                            <td><?php echo $show->content; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Date</b></td>
                            <td><?php echo $show->date_time; ?></td>                              
                        </tr>      
                        <tr>
                            <td><b>Image</b></td>
                            <td><img width="1000" height="550" src="/public/images/blog/<?php echo $show->image; ?>"></td>                              
                        </tr>                
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/blog/show.blade.php ENDPATH**/ ?>
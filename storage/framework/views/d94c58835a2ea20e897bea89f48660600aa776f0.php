

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Show Content<a href="<?php echo e(url()->previous()); ?>" ><span class="button gray">List</span></a> </h4>    
            <div class="table-box">
                <table class="basic-table booking-table">
                    
                    <tbody>
                        <tr>
                            <td><b>Cousrse</b></td>
                            <td><?php echo $show->course_title; ?></td>                              
                        </tr>    
                        <tr>
                            <td><b>Subject</b></td>
                            <td><?php echo $show->subject; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Subject Code</b></td>
                            <td><?php echo $show->subject_code; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Content</b></td>
                            <td><?php echo $show->content; ?></td>                              
                        </tr>  
                        <tr>
                            <td><b>Status</b></td>
                            <td><?php echo $show->is_active == 1 ? 'Active' : 'Inactive'; ?></td>                              
                        </tr>                   
                    </tbody>
                </table>
            </div>       
        </div>       
    </div>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/ebook/show.blade.php ENDPATH**/ ?>
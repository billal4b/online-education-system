<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
        <div class="row">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Databsde Backup</h4>
                    <form  action="<?php echo e(route('admin.data.backup')); ?>" method="post">
                        <?php echo csrf_field(); ?> 
                        <div class="dashboard-list-box-static">          
                            <button type="submit" class="button"><?php echo e(__('Backup Data')); ?></button>
                        </div>   
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/backend/backup/index.blade.php ENDPATH**/ ?>
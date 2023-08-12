
<?php $__env->startSection('css'); ?> 
<style>
  
</style>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row">
    
    <div class="col-lg-12 col-md-12 col-xs-12">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard-list-box">
            <h4 class="gray">Word List <a href="<?php echo e(route('admin.wordbook.create')); ?>" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>      
                            <th>Bengali</th>                    
                            <th>Arabic</th>                    
                            <th>English</th> 
                            <th>Book</th>  
                            <th>Lesson</th>  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $wordbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wordbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo $wordbook->bengali_word; ?></td>
                            <td><?php echo $wordbook->arabic_word; ?></td>
                            <td><?php echo $wordbook->english_word; ?></td>
                            <td><?php echo $wordbook->book_name; ?></td>
                            <td><?php echo $wordbook->lesson_name; ?></td>
                            <td>                         
                                <a href="<?php echo e(route('admin.wordbook.edit', $wordbook->id)); ?>" class="button">Edit</a>
                                <a href="<?php echo e(route('admin.wordbook.delete', $wordbook->id)); ?>" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
                            </td>   
                        </tr>

                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
            </div>

        </div>
        <?php echo $wordbooks->links(); ?>  
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/wordbook/index.blade.php ENDPATH**/ ?>
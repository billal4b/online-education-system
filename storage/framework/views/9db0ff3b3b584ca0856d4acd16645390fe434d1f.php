<?php $__env->startSection('css'); ?>
 .my-profile textarea {
       height: auto;
    }
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="dashboard-form">
    <div class="row">
        <form  action="<?php echo e(route('admin.exam.update', $edit->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Question Answer<a href="<?php echo e(url()->previous()); ?>"><span class="button gray">List</span></a></h4>
                    <div class="dashboard-list-box-static">
                        <!-- Details -->
                        <div class="my-profile">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <?php

                                    ?>
                                    <?php
                                        $test = json_decode($answer, true);
                                        //dd($answer);
                                        $a = [];
                                    ?>
                                        <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php $a[$key] = $val; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-10 col-md-10 col-xs-12">
                                        <label for="answer"><strong style="font-size: 25px;"><?php echo $k; ?> </strong></label>
                                        <textarea id="answer" name="answer" type="text" style="font-size: 20px; rows="7" readonly class="form-control <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo $v; ?></textarea>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-xs-12">
                                        <label for="qs_m"><strong><?php echo e(__('Mark')); ?></strong></label>
                                        <input id="answer[<?php echo trim($k); ?>]" onblur="findTotal()" name="qs_m" type="number" placeholder="Number" class="form-control <?php $__errorArgs = ['qs_m'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="is_active"><strong><?php echo e(__('Status')); ?></strong></label>
                                    <select id="type" name="is_active" class="form-control">
                                        <option value="1" <?php echo e($edit->is_active == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e($edit->is_active == 0 ? 'selected' : ''); ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <label for="marks"><strong><?php echo e(__('Total Marks')); ?></strong></label>
                                    <input id="marks" name="marks" placeholder="Total Number" type="text" value="<?php echo ($edit->marks); ?>" class="form-control <?php $__errorArgs = ['marks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                    <?php $__errorArgs = ['marks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div><br>
                        <button type="submit" class="button"><?php echo e(__('Save')); ?></button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  function findTotal(){
    var arr = document.getElementsByName('qs_m');
    var tot=0 ;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('marks').value = tot;
}
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/exam/edit.blade.php ENDPATH**/ ?>
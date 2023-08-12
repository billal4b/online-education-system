<?php $__env->startSection('css'); ?>
<style>
    .dashboard {
        padding-left: 0px;
    }
    .list-group-item {
        min-height: 50px;
    }
    .list-group-item-heading, .list-group-item-text {
       text-align: center;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Online Exam <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
<section id="mt_contact" class="contact-main section-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard">
                <a href="#" class="list-group-item active">
                    <h3 class="list-group-item-heading">Question Not Ready!!</h3>
                    <p class="list-group-item-text">Please contact your Instructor.</p>
                    </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/exam-not-start.blade.php ENDPATH**/ ?>
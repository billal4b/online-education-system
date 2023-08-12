<?php $__env->startSection('css'); ?>
    <style>
        .dashboard-stat-content h3 {
            font-size: 25px;
            font-weight: 600;
            padding: 0;
            margin: 0;
            color: #fff;
            font-family: "Open Sans";
            letter-spacing: -1px;
        }
        .dashboard-stat {         
            cursor: inherit;          
        }
    </style>   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>  
    <div class="row">
        <!--flash Message-->
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Item 1 -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <a href="<?php echo e(route('user.payment')); ?>">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h3>Payment</h3> <span>Your Pay</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Visa"></i></div>
            </div>
            </a>
        </div>
       
         <?php if(Auth::user()->is_kids == 1): ?> 
             <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('ebook')); ?>">
                    <div class="dashboard-stat color-2">
                        <div class="dashboard-stat-content"><h3>eBook</h3> <span>Library</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Open-Book"></i></div>
                    </div>
                </a>
            </div> 
            <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('result')); ?>">
                    <div class="dashboard-stat color-3">
                        <div class="dashboard-stat-content"><h3>Exam</h3> <span>Result</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Teacher"></i></div>
                    </div>
                </a>
            </div> 
         <?php else: ?>
             <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('todayclass')); ?>">
                    <div class="dashboard-stat color-2">
                        <div class="dashboard-stat-content"><h3>Today</h3> <span>Class</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Video-Tripod"></i></div>
                    </div>
                </a>
            </div> 
             <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('user.video')); ?>">
                    <div class="dashboard-stat color-3">
                        <div class="dashboard-stat-content"><h3>Video</h3> <span>Tutorial</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Video-4"></i></div>
                    </div>
                </a>
            </div> 
            <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('user.pdf')); ?>">
                    <div class="dashboard-stat color-4">
                        <div class="dashboard-stat-content"><h3>Lecture</h3> <span>Sheet</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-File-Cloud"></i></div>
                    </div>
                </a>
            </div> 
            <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('dictionary.arabic')); ?>">
                    <div class="dashboard-stat color-2">
                        <div class="dashboard-stat-content"><h3>Dictionary</h3> <span>Quranic</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Books"></i></div>
                    </div>
                </a>
            </div> 
            <div class="col-lg-3 col-md-6 col-xs-6">
                <a href="<?php echo e(route('wordbook')); ?>">
                    <div class="dashboard-stat color-1">
                        <div class="dashboard-stat-content"><h3>Dictionary</h3> <span>All</span></div>
                        <div class="dashboard-stat-icon"><i class="im im-icon-Book"></i></div>
                    </div>
                </a>
            </div> 
         <?php endif; ?>
       
       
    </div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('userend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/iqsbdcom/public_html/resources/views/userend/layouts/dashboard.blade.php ENDPATH**/ ?>
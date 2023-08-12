<?php $__env->startSection('css'); ?>
<style>
    .dashboard {
        padding-left: 0px;
    }
    .list-group-item {
        min-height: 150px;
    }
    .display {
       /* display: none; */
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Online Exam <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
<section id="mt_contact" class="contact-main section-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Student Name</h4>
                        <p class="list-group-item-text"><?php echo e(Auth::user()->name); ?></p>
                      </a>
                </div>
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Exam Name</h4>
                        <p class="list-group-item-text"><?php echo e(!empty($data) ? $data->exam_title:''); ?></p>
                      </a>
                </div>
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Course Name</h4>
                        <p class="list-group-item-text"><?php echo e(!empty($data) ? $data->course_title:''); ?></p>
                      </a>
                </div>
                <div class="col-md-3 dashboard">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading">Time Zone</h4>
                        <p class="list-group-item-text"><span>Start-</span>
                         <?php
                            $date = (!empty($data) ? $data->start_time:'');
                            echo date('h:i a d/m/Y', strtotime($date));
                         ?>
                        </p>
                        <p class="list-group-item-text"><span>End-</span>
                            <?php
                                $date = (!empty($data) ? $data->end_time:'');
                                echo date('h:i a d/m/Y', strtotime($date));
                            ?>
                        </p>
                      </a>
                </div>

            </div>
            <form method="POST" action="<?php echo e(route('exam.start')); ?>" >
                <?php echo csrf_field(); ?>
                <div class="col-md-12 display"><br>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="user_name" id="user_name" value="<?php echo e(Auth::user()->name); ?>">
                    <input type="hidden" name="exam_key" id="exam_key" value="<?php echo e(!empty($data) ? $data->id:''); ?>">
                    <input type="hidden" name="exam_title" id="exam_title" value="<?php echo e(!empty($data) ? $data->exam_title:''); ?>">
                    <input type="hidden" name="course_title" id="course_title" value="<?php echo e(!empty($data) ? $data->course_title:''); ?>">
                    <input type="hidden" name="duration"  id="duration" value="<?php echo e(!empty($data) ? $data->duration:''); ?>">
                    <input type="hidden" name="start_time" id="start_time" value="<?php echo e(!empty($data) ? $data->start_time:''); ?>">
                    <input type="hidden" name="end_time" id="end_time" value="<?php echo e(!empty($data) ? $data->end_time:''); ?>">

                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" name="question[<?php echo trim($question); ?>]" id="question" value="Answer: ">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>
                    <div class="text-center">
                        <button type="submit" id="my-btn" name="submit" class="mt_btn_yellow" disabled><?php echo e(__('Start Exam')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
    $start_time = (!empty($data) ? $data->start_time:'');
   //$start_time = date("h:i",strtotime($start_time));
    $end_time = (!empty($data) ? $data->end_time:'' );
   // $end_time = date("h:i",strtotime($end_time));
    //echo($end_time);
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
var myStartTime = '<?php echo $start_time; ?>';
var myEndTime ='<?php echo $end_time; ?>';
var buttonEnableTimerId = null;
var buttonDisableTimerId = null;
$(document).ready(function(){
  buttonEnable();
  buttonDisable();
  setTimeout(() => {
  buttonEnableTimerId = setInterval(() => buttonEnable(), 1000);
  buttonDisableTimerId = setInterval(() => buttonDisable(), 1000);
  }, 1000);
//   $("#my-btn").click(function(){
//     alert("Hello, I am alert.");
//   });
});
function buttonEnable() {
  var sTime = new Date();
  var eTime = new Date(myStartTime);
  if (calculateTime(sTime, eTime) <= 0) {
  	// Exam time start button enable and clear button enable timer id
    $("#my-btn").prop("disabled", false);
    clearInterval(buttonEnableTimerId);
  }
}
function buttonDisable() {
  var sTime = new Date();
  var eTime = new Date(myEndTime);
  if (calculateTime(eTime, sTime) >= 0) {
  	// Exam time start button enable and clear button enable timer id
    $("#my-btn").prop("disabled", true);
    clearInterval(buttonDisableTimerId);
  }
}
function calculateTime(startTime, endTime) {
  //console.log('startTime==', startTime, 'endTime=', endTime)
  var snTime = startTime.getTime();
  var enTime = endTime.getTime();
  var diff = enTime - snTime;
  var diffInSec = (diff / 1000);
  //console.log('diffInSec==', diffInSec);
  return diffInSec;
}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/exam-start.blade.php ENDPATH**/ ?>
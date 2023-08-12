
<?php $__env->startSection('css'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>    

<div class="dashboard-form">
    <div class="row">
                   
        <!-- Profile -->
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Add New Word <a href="<?php echo e(url()->previous()); ?>"><span class="button gray">Back</span></a></h4>
                <div class="dashboard-list-box-static">                        
                    <!-- Details -->
                    <div class="my-profile">
                        
                        <div class="row">
                            <div class="table-responsive">
                                <form method="post" id="dynamic_form">
                                    <?php echo csrf_field(); ?>
                                    <span id="result"></span>
                                    <table class="table table-bordered table-striped" id="user_table">
                                        <thead>
                                            <tr>
                                                <th width="20%">Bengali</th>
                                                <th width="20%">Arabic</th>
                                                <th width="20%">English</th>
                                                <th width="15%">Book</th>
                                                <th width="15%">Lesson</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" align="right">&nbsp;</td>
                                                <td>
                                              <?php echo csrf_field(); ?>
                                              <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                             </td>
                                            </tr>
                                           </tfoot>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>        
                            
            </div>
        </div>
    </div>
</div>  
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
    var count = 1;
    dynamic_field(count);
    function dynamic_field(number)
    {
        html = '<tr>';
            html += '<td><input type="text" name="bengali_word[]" class="form-control" required/></td>';
            html += '<td><input type="text" name="arabic_word[]" class="form-control" required/></td>';
            html += '<td><input type="text" name="english_word[]" class="form-control" required/></td>';
            html += '<td><input type="text" name="book_name[]" class="form-control" /></td>';
            html += '<td><input type="text" name="lesson_name[]" class="form-control" /></td>';

            if(number > 1) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            } else {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
    }

    $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
    });

    $('#dynamic_form').on('submit', function(event){
       
        event.preventDefault();
        $.ajax({
            url:'<?php echo e(route("admin.wordbook.store")); ?>',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            // beforeSend:function(){
            //     $('#save').attr('disabled','disabled');
            // },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++){
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                } else {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
    });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/wordbook/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('css'); ?>
    <style></style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>

    <div class="dashboard-form">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Add Word <a href="<?php echo e(url('/admin/arabic-dictionary')); ?>"><span class="button gray">Back</span></a>
                    </h4>
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
                                                <th width="20%">Lesson</th>
                                                <th width="10%">How Many?</th>
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
                                                    <input type="submit" name="save" id="save" class="btn btn-primary"
                                                           value="Save"/>
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
    <link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            function refreshSelect2() {
                // if ($('.subject').data('select2')) {
                //     $('.subject').select2('destroy');
                // }
                $('.subject').select2({
                    theme: "bootstrap",
                    tags: true,
                    allowClear: true,
                    placeholder: 'Type Subject',
                    minimumInputLength: 0,
                    ajax: {
                        url: '<?php echo e(route('dictionary.quarnic.subject.search')); ?>',
                        dataType: 'json'
                    }
                }).on('change', function (e) {
                    let sub = $(this).find(":selected").text();
                    $(this).closest('td').find('.hidden_text').val(sub)
                    console.log($(this).closest('td').find('.hidden_text').val())
                    //alert(sub)
                })
            }

            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="text" name="bengali_word[]" class="form-control" required/></td>';
                html += '<td><input type="text" name="arabic_word[]" class="form-control" required/></td>';
                html += '<td><input type="text" name="english_word[]" class="form-control"/></td>';
                // html += '<td><input type="text" name="lesson_word[]" class="form-control"/></td>';
                html += '<td>' +
                    '<select name="lesson_word[]" style="height: 35px" class="form-control subject"></select>' +
                    '<input type="hidden" value="" name="lesson_word_text[]" class="hidden_text">' +
                    '</td>';
                html += '<td><input type="number" name="total_used[]" class="form-control"/></td>';

                if (number > 1) {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
                refreshSelect2()

            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function (event) {

                event.preventDefault();
                $.ajax({
                    url: '<?php echo e(route("admin.arabic-dictionary.store")); ?>',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    // beforeSend:function(){
                    //     $('#save').attr('disabled','disabled');
                    // },
                    success: function (data) {
                        if (data.error) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<p>' + data.error[count] + '</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                        } else {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' + data.success + '</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/backend/arabic-dictionary/create.blade.php ENDPATH**/ ?>
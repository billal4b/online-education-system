<?php $__env->startSection('css'); ?>
    <style>
        .color:hover {
            background-color: yellow;
            padding: 10px;
        }

        .noticelink {
            background-color: yellowgreen;
            padding: 10px;
        }

        #blog_main_sec .post-detail_container .post-content .post-metadata li {
            font-size: 16px;
            line-height: 30px;
        }

        #blog_main_sec .post-detail_container .post-content {
            height: 100px;
        }

        .blog-post_wrapper {
            border-radius: 15px;
            -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 0px 5px rgba(0, 0, 0, 0);
            box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 0px 5px rgba(0, 0, 0, 0);
        }

        /*.blog-post_wrapper:focus {*/
        /*   background-color: red !important;*/
        /*}*/

        .post-content {
            margin-top: 30px;
            font-size: 18px;
        }

        .cardArea, .cardAreaSubject {
            cursor: pointer;
            color: #ffac00;
        }

        #cover-spin {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        #cover-spin::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: black;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
        #ebookList {
            height: 350px !important;
            overflow: scroll
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> eBook <?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
    <section id="blog_main_sec" class="section-inner">
        <div id="cover-spin"></div>
        <div class="container">
            <input type="hidden" name="courseId" id="courseId" value="">
            <input type="hidden" name="subjectType" id="subjectType" value="">
            <div class="row">
                
                <div class="col-sm-12" id="courseArea">
                    <div class="row blog_post_sec">
                        <?php $__currentLoopData = COURSE_NAME; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseKey=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 grid-item">
                                <div class="blog-post_wrapper cardArea" data-coursekey="<?php echo e($courseKey); ?>"
                                     data-courseTitle="<?php echo e($course); ?>">
                                    <div class="blog-post-inner_wrapper">

                                        <div class="post-detail_container">
                                            <div class="post-content text-center">
                                                <b><i class="ion-ios-person-outline"></i>&nbsp;<?php echo e($course); ?></b>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
                <div class="col-sm-12" id="subjectArea" style="display: none">
                    <div class="row blog_post_sec">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Course: <span id="courseTitleHere"></span></h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="mt_btn_green pull-right" title="Go to Course" id="backToCourse">
                                        << </a>
                                </div>
                            </div>
                        </div>
                        <?php $__currentLoopData = SUBJECT_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectKey=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-3 col-xs-12 grid-item">
                                <div class="blog-post_wrapper cardAreaSubject" data-subjectkey="<?php echo e($subjectKey); ?>"
                                     data-subjectTitle="<?php echo e($subjectKey); ?>">
                                    <div class="blog-post-inner_wrapper">
                                        <div class="post-detail_container">
                                            <div class="post-content text-center">
                                                <b><i class="ion-ios-book-outline"></i>&nbsp;<?php echo e($subject); ?> </b>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-md-12" id="filterArea"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="<?php echo e(asset('public/select2/select2.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/select2/select2-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo e(asset('public/select2/select2.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            var cardArea = ".cardArea"
            var cardAreaSubject = ".cardAreaSubject"

            function getEbooksByDateRange() {
                $('#dateRange').daterangepicker({
                    //autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'DD-MM-YYYY',
                        separator: ' to '
                    },
                    maxSpan: {
                        "days": 10
                    },
                });

            }
            $(document).on('click','.cancelBtn', function(ev, picker) {
                $('#dateRange').val('');
                getFilteredBook();
            });
            $(document).on('click', '.applyBtn', function () {
                getFilteredBook()
            });
            $(document).on('change', '#topicSelection', function () {
                getFilteredBook()
            });
            function getFilteredBook(){
                var searchKey = $('#topicSelection option:selected').text()
                var date_range = $('#dateRange').val()
                var course_id = $('#courseId').val()
                var subject_id = $('#subjectType').val()
                $.ajax({
                    url: "<?php echo e(route('ebook.filter.daterange.booklist')); ?>",
                    type: "GET",
                    dataType: "json",
                    data: {
                        course_id: course_id,
                        subject_id: subject_id,
                        date_range: date_range,
                        search_key: searchKey,
                    },
                    beforeSend: function () {
                        $('#cover-spin').show(0)
                    },
                    success: function (response) {
                        $('#ebookList').html(response.html)
                        $('html, body').animate({
                            scrollTop: $("#filterArea").offset().top
                        }, 1000);
                        getContentDetail()
                    },
                    complete: function () {
                        $('#cover-spin').hide(0)
                    },
                    error: function () {
                        $('#cover-spin').hide(0)
                    }
                })
            }

            $(cardArea).hover(function () {
                $(this).css("backgroundColor", 'black').fadeIn(200);
            }, function () {
                $(this).css("backgroundColor", 'white').fadeIn("slow");
            });
            $(cardArea).click(function () {
                var courseId = $(this).attr('data-coursekey')
                var courseTitle = $(this).attr('data-courseTitle')
                $('#courseId').val(courseId)
                $('#courseTitleHere').html(courseTitle)
                $('#courseArea').hide()
                $('#subjectArea').show("slow")
            })

            $(cardAreaSubject).hover(function () {
                $(this).css("backgroundColor", 'black').fadeIn(200);
            }, function () {
                $(this).css("backgroundColor", 'white').fadeIn("slow");
            });

            $('#backToCourse').click(function (event) {
                event.preventDefault()
                $('#filterArea').html('')
                $('#courseId').val('')
                $('#subjectType').val('')
                $('#subjectArea').hide()
                $('#courseArea').show("slow")
            })

            $(cardAreaSubject).click(function () {
                $(this).css("backgroundColor", 'teal').fadeIn("slow");
                var course_id = $('#courseId').val()
                var subject_id = $(this).attr('data-subjectKey')
                $('#subjectType').val(subject_id)
                $.ajax({
                    url: "<?php echo e(route('ebook.filter')); ?>",
                    type: "GET",
                    dataType: "json",
                    data: {
                        course_id: course_id,
                        subject_id: subject_id,
                    },
                    beforeSend: function () {
                        $('#cover-spin').show(0)
                    },
                    success: function (response) {
                        $('#filterArea').html(response.html)
                        $('html, body').animate({
                            scrollTop: $("#filterArea").offset().top
                        }, 1000);
                        getContentDetail()
                        getEbooksByDateRange()

                    },
                    complete: function () {
                        $('#cover-spin').hide(0)
                    },
                    error: function () {
                        $('#cover-spin').hide(0)
                    }
                })
            })

            function getContentDetail() {
                $('.topic_link').click(function (event) {
                    event.preventDefault()
                    var ebook_id = $(this).attr('data-ebookId')
                    $.ajax({
                        url: "<?php echo e(route('ebook.filter.content')); ?>",
                        type: "GET",
                        dataType: "json",
                        data: {
                            ebook_id: ebook_id,
                        },
                        beforeSend: function () {
                            $('#cover-spin').show(0)
                        },
                        success: function (response) {
                            $('#topicTitle').html(response.topic)
                            $('#contntArea').html(response.html)
                            $('html, body').animate({
                                scrollTop: $("#filterArea").offset().top
                            }, 1000);
                        },
                        complete: function () {
                            $('#cover-spin').hide(0)
                        },
                        error: function () {
                            $('#cover-spin').hide(0)
                        }
                    })
                })
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/ebook.blade.php ENDPATH**/ ?>
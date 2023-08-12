<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'Frontend\FrontendHomeController@index');
Route::get('/courses', 'Frontend\FrontendHomeController@courses');

Route::get('/quran-teaching-course', 'Frontend\FrontendCoursesController@quranTeachingCourse');
Route::get('/arabic-language-teaching-course', 'Frontend\FrontendCoursesController@arabicLanguageCourses');
Route::get('/hifjul-quran', 'Frontend\FrontendCoursesController@hifjulQuran');

Route::get('/hifjul-quran-male', 'Frontend\FrontendCoursesController@hifjulQuranMale');
Route::get('/hifjul-quran-female', 'Frontend\FrontendCoursesController@hifjulQuranFemale');
Route::get('/islamic-studies', 'Frontend\FrontendCoursesController@islamicStudy');

Route::get('/kaidah', 'Frontend\FrontendCoursesController@kaidah');
Route::get('/amparra', 'Frontend\FrontendCoursesController@amparra');
Route::get('/najerah', 'Frontend\FrontendCoursesController@najerah');
Route::get('/pre-hifz', 'Frontend\FrontendCoursesController@preHifz');

Route::get('/registration', 'Auth\RegistrationController@registerForm')->name('register.form');
Route::post('/registration', 'Auth\RegistrationController@registerCreate')->name('register.create');
Route::get('/admission-form', 'Frontend\AdmissionController@admissionForm')->name('admission.form');
Route::post('/admission-form', 'Frontend\AdmissionController@admissionCreate')->name('admission.create');



Route::get('/today-class', 'Frontend\FrontendTodayClassController@index')->name('todayclass');

Route::get('/dictionary-arabic', 'Frontend\FrontendArabicDictionaryController@dictionary')->name('dictionary.arabic');
Route::get('/dictionary-arabic-subject-search', 'Frontend\FrontendArabicDictionaryController@dictionarySubjectSearch')->name('dictionary.quarnic.subject.search');
Route::get('/dictionary', 'Frontend\FrontendPostController@wordbook')->name('wordbook');
Route::get('/search', 'Frontend\FrontendPostController@action')->name('search.wordbook');
Route::get('/dictionary-bookname-search', 'Frontend\FrontendPostController@dictionaryBookNameSearch')->name('dictionary.bookname.search');
Route::get('/dictionary-lesson-no-search', 'Frontend\FrontendPostController@dictionaryLessonNoSearch')->name('dictionary.lesson.search');
Route::get('/result', 'Frontend\FrontendPostController@result')->name('result');
Route::get('/about-us', 'Frontend\FrontendPostController@aboutUs');
Route::get('/contact-us', 'Frontend\FrontendPostController@contactUs');
Route::get('blog', 'Frontend\FrontendPostController@blog');
Route::any('/blog/{slug}', 'Frontend\FrontendPostController@blogDetails')->name('blog.post');

Route::middleware(['auth', 'urlmiddleware'])->group(function () {

    Route::get('/exam', 'Frontend\FrontendExamController@exam')->name('exam');
    Route::post('/exam-start', 'Frontend\FrontendExamController@examStart')->name('exam.start');
    Route::get('/exam-form/{id}', 'Frontend\FrontendExamController@examForm')->name('exam.form');
    Route::post('/exam-form/{id}', 'Frontend\FrontendExamController@examSubmit')->name('exam.submit');

    /*moshiur start*/
    Route::get('ebook', 'Frontend\FrontendPostController@ebook')->name('ebook');
    Route::get('ebook-topic-search', 'Frontend\FrontendPostController@ebookTopicSearch')->name('ebook.topic.search');
    Route::get('ebook-filter', 'Frontend\FrontendPostController@findEbook')->name('ebook.filter');
    Route::get('ebook-filter-content', 'Frontend\FrontendPostController@getSingleBookDetail')->name('ebook.filter.content');
    Route::get('ebook-filter-date-range-booklist', 'Frontend\FrontendPostController@getDateRangeWiseBookList')->name('ebook.filter.daterange.booklist');
    /*moshiur end*/

	Route::get('/dashboard/', 'Userend\UserEndDashboardController@dashboardUser')->name('user.dashboard');
    Route::get('/change-password/', 'Userend\UserEndDashboardController@passwordUser')->name('user.password');
    Route::post('/change-password/', 'Userend\UserEndDashboardController@passwordUserUpdate')->name('user.password.update');
    Route::get('/user-profile/', 'Userend\UserEndDashboardController@profileUser')->name('user.profile');
    Route::post('/user-profile/{id}', 'Userend\UserEndDashboardController@profilePictureUser')->name('user.profile.picture');
    Route::get('/user-profile/edit/{id}', 'Userend\UserEndDashboardController@profileEditUser')->name('user.profile.edit');
    Route::post('/user-profile/update/{id}', 'Userend\UserEndDashboardController@profileUpdateUser')->name('user.profile.update');
    Route::get('/user-payment', 'Userend\UserEndDashboardController@paymentUser')->name('user.payment');

    Route::get('/video-lecture', 'Frontend\FrontendMediaController@video')->name('user.video');
	Route::get('lecture-sheet', 'Frontend\FrontendMediaController@sheet')->name('user.pdf');
    Route::any('/lecture-sheet/{slug}', 'Frontend\FrontendMediaController@pdfDetails')->name('pdf.singlePost');
});

Route::get('/audio-lecture', 'Frontend\FrontendMediaController@audio')->name('audio');
Route::get('/gallery', 'Frontend\FrontendMediaController@gallery');

Route::post('/contact-us/add', 'ContactController@store')->name('admin.contact.store');

Route::get('notice', 'Frontend\FrontendNoticeController@notice');
Route::any('/notice/{slug}', 'Frontend\FrontendNoticeController@noticeDetails')->name('notice.post');

Route::get('/payment', 'Frontend\FrontendPaymentInfoController@index')->name('payment');
Route::post('/payment', 'Frontend\FrontendPaymentInfoController@store')->name('paymentinfo.form');

Route::get('/pledge', 'Frontend\FrontendFundPledgeController@index')->name('pledge');
Route::post('/pledge', 'Frontend\FrontendFundPledgeController@store')->name('fundPledge.form');

/*
Route::get('/blog', 'Frontend\FrontendPostController@blog');
Route::get('/{url}',[
    'as' => 'blog.post',
    'uses' => 'Frontend\FrontendPostController@blogDetails'
]);
*/


/* Back end Admin panel Route */

Auth::routes();
Route::middleware(['auth', 'adminmiddleware'])->group(function () {

    Route::get('/admin/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'DashboardController@index',
    ]);
    /*------------- User --------------*/
       Route::get('/admin/user', [
        'as' => 'admin.user',
        'uses' => 'UserController@index'
    ]);
    Route::get('admin/user/edit/{id}', [
        'as' => 'admin.edit',
        'uses' => 'UserController@edit'
    ]);
    Route::post('admin/user/update/{id}', [
        'as' => 'admin.update',
        'uses' => 'UserController@update'
    ]);
    Route::any('/admin/user/delete/{id}', [
        'as' => 'admin.user.delete',
        'uses' => 'UserController@destroy'
    ]);
    Route::get('/admin/user-name-search', [
        'as' => 'admin.user.name.search',
        'uses' => 'UserController@userNameSearch'
    ]);
    Route::get('/admin/profile', [
        'as' => 'admin.profile',
        'uses' => 'UserController@adminProfile'
    ]);
     Route::post('/admin/profile/picture/{id}', [
        'as' => 'admin.profile.picture',
        'uses' => 'UserController@adminProfilePicture'
    ]);

    /*------------- Admission  --------------*/
    Route::get('/admin/admitted-user', [
        'as' => 'admin.admitted.user',
        'uses' => 'UserController@admittedUser'
    ]);

    Route::get('/admin/admitted-user/{id}', [
        'as' => 'admin.admitted.show',
        'uses' => 'UserController@admittedUserShow'
    ]);

    Route::any('/admin/admitted-delete/{id}', [
        'as' => 'admin.admitted.delete',
        'uses' => 'UserController@admittedUserDestroy'
    ]);

    /*------------- Password update  --------------*/

    Route::get('/admin/change-password', [
        'as' => 'admin.password',
        'uses' => 'UserController@changePassword'
    ]);
    Route::post('/admin/change-password', [
        'as' => 'admin.change.password',
        'uses' => 'UserController@upadatePassword'
    ]);

    /*------------- Page Section --------------*/

    Route::get('/admin/section', [
        'as' => 'admin.section',
        'uses' => 'SectionController@index'
    ]);
    Route::get('/admin/section/add', [
        'as' => 'admin.section.create',
        'uses' => 'SectionController@create'
    ]);
    Route::post('/admin/section/add', [
        'as' => 'admin.section.store',
        'uses' => 'SectionController@store'
    ]);
    Route::get('/admin/section/edit/{id}', [
        'as' => 'admin.section.edit',
        'uses' => 'SectionController@edit'
    ]);
    Route::post('/admin/section-update/{id}', [
        'as' => 'admin.section.update',
        'uses' => 'SectionController@update'
    ]);
    Route::any('/admin/section-delete/{id}', [
        'as' => 'admin.section.delete',
        'uses' => 'SectionController@destroy'
    ]);

    /*-------------Page Content --------------*/

    Route::get('/admin/content', [
        'as' => 'admin.content',
        'uses' => 'ContentController@index'
    ]);
    Route::get('/admin/content/add', [
        'as' => 'admin.content.create',
        'uses' => 'ContentController@create'
    ]);
    Route::post('/admin/content/add', [
        'as' => 'admin.content.store',
        'uses' => 'ContentController@store'
    ]);
    Route::get('/admin/content/edit/{id}', [
        'as' => 'admin.content.edit',
        'uses' => 'ContentController@edit'
    ]);
    Route::post('/admin/content-update/{id}', [
        'as' => 'admin.content.update',
        'uses' => 'ContentController@update'
    ]);
    Route::get('/admin/content-show/{id}', [
        'as' => 'admin.content.show',
        'uses' => 'ContentController@show'
    ]);
    Route::any('/admin/content-delete/{id}', [
        'as' => 'admin.content.delete',
        'uses' => 'ContentController@destroy'
    ]);

    /*------------- Image --------------*/

    Route::get('/admin/image', [
        'as' => 'admin.image',
        'uses' => 'PhotoController@index'
    ]);
    Route::get('/admin/image/add', [
        'as' => 'admin.image.create',
        'uses' => 'PhotoController@create'
    ]);
    Route::post('/admin/image/add', [
        'as' => 'admin.image.store',
        'uses' => 'PhotoController@store'
    ]);
    Route::get('/admin/image-change-status', [
        'as' => 'admin.image.change.status',
        'uses' => 'PhotoController@changeStatus'
    ]);
    Route::any('/admin/image-delete/{id}', [
        'as' => 'admin.image.delete',
        'uses' => 'PhotoController@destroy'
    ]);

    /*------------- Media --------------*/

    Route::get('/admin/media', [
        'as' => 'admin.media',
        'uses' => 'MediaController@index'
    ]);
    Route::post('/admin/media/search', [
        'as' => 'admin.media.search',
        'uses' => 'MediaController@dropdownSearch'
    ]);
    Route::get('/admin/media/add', [
        'as' => 'admin.media.create',
        'uses' => 'MediaController@create'
    ]);
    Route::post('/admin/media/add', [
        'as' => 'admin.media.store',
        'uses' => 'MediaController@store'
    ]);
    Route::get('/admin/media/edit/{id}', [
        'as' => 'admin.media.edit',
        'uses' => 'MediaController@edit'
    ]);
    Route::post('/admin/media/update/{id}', [
        'as' => 'admin.media.update',
        'uses' => 'MediaController@update'
    ]);
    Route::any('/admin/media/delete/{id}', [
        'as' => 'admin.media.delete',
        'uses' => 'MediaController@destroy'
    ]);
     Route::get('/admin/media/title/search', [
        'as' => 'admin.media.title.search',
        'uses' => 'MediaController@mediatitleSearch'
    ]);
    /*------------- PDF --------------*/

    Route::get('/admin/pdf', [
        'as' => 'admin.pdf',
        'uses' => 'PdfController@index'
    ]);
    Route::get('/admin/pdf/add', [
        'as' => 'admin.pdf.create',
        'uses' => 'PdfController@create'
    ]);
    Route::post('/admin/pdf/add', [
        'as' => 'admin.pdf.store',
        'uses' => 'PdfController@store'
    ]);
    Route::get('/admin/pdf/edit/{id}', [
        'as' => 'admin.pdf.edit',
        'uses' => 'PdfController@edit'
    ]);
    Route::post('/admin/pdf/update/{id}', [
        'as' => 'admin.pdf.update',
        'uses' => 'PdfController@update'
    ]);
    Route::any('/admin/pdf/delete/{id}', [
        'as' => 'admin.pdf.delete',
        'uses' => 'PdfController@destroy'
    ]);

    Route::get('/admin/pdf/show/{id}', [
        'as' => 'admin.pdf.show',
        'uses' => 'PdfController@show'
    ]);
    /*------------- Courses --------------*/

    Route::get('/admin/course', [
        'as' => 'admin.course',
        'uses' => 'CoursesController@index'
    ]);
    Route::get('/admin/course/add', [
        'as' => 'admin.course.create',
        'uses' => 'CoursesController@create'
    ]);
    Route::post('/admin/course/add', [
        'as' => 'admin.course.store',
        'uses' => 'CoursesController@store'
    ]);
    Route::get('/admin/course/edit/{id}', [
        'as' => 'admin.course.edit',
        'uses' => 'CoursesController@edit'
    ]);
    Route::post('/admin/course/update/{id}', [
        'as' => 'admin.course.update',
        'uses' => 'CoursesController@update'
    ]);
    Route::any('/admin/course/delete/{id}', [
        'as' => 'admin.course.delete',
        'uses' => 'CoursesController@destroy'
    ]);

    /*------------- Course Details--------------*/

    Route::get('/admin/course-details', [
        'as' => 'admin.course.details',
        'uses' => 'CourseDetailsController@index'
    ]);
    Route::get('/admin/course-details/add', [
        'as' => 'admin.course.details.create',
        'uses' => 'CourseDetailsController@create'
    ]);
    Route::post('/admin/course-details/add', [
        'as' => 'admin.course.details.store',
        'uses' => 'CourseDetailsController@store'
    ]);
    Route::get('/admin/course-details/edit/{id}', [
        'as' => 'admin.course.details.edit',
        'uses' => 'CourseDetailsController@edit'
    ]);
    Route::post('/admin/course-details/update/{id}', [
        'as' => 'admin.course.details.update',
        'uses' => 'CourseDetailsController@update'
    ]);
    Route::any('/admin/course-details/delete/{id}', [
        'as' => 'admin.course.details.delete',
        'uses' => 'CourseDetailsController@destroy'
    ]);


    /*------------- Contact Us --------------*/

    Route::get('/admin/contact', [
        'as' => 'admin.contact',
        'uses' => 'ContactController@index'
    ]);
    Route::any('/admin/contact/{id}', [
        'as' => 'admin.contact.delete',
        'uses' => 'ContactController@destroy'
    ]);

    /*------------- Backup Database--------------*/

    Route::get('/admin/backup', [
        'as' => 'admin.backup',
        'uses' => 'BackupController@index'
    ]);
    Route::post('/admin/backup', [
        'as' => 'admin.data.backup',
        'uses' => 'BackupController@backup'
    ]);


    /*-------------Blog --------------*/

    Route::get('/admin/blog', [
        'as' => 'admin.blog',
        'uses' => 'BlogController@index'
    ]);
    Route::get('/admin/blog/add', [
        'as' => 'admin.blog.create',
        'uses' => 'BlogController@create'
    ]);
    Route::post('/admin/blog/add', [
        'as' => 'admin.blog.store',
        'uses' => 'BlogController@store'
    ]);
    Route::get('/admin/blog/edit/{id}', [
        'as' => 'admin.blog.edit',
        'uses' => 'BlogController@edit'
    ]);
    Route::post('/admin/blog-update/{id}', [
        'as' => 'admin.blog.update',
        'uses' => 'BlogController@update'
    ]);
    Route::get('/admin/blog-show/{id}', [
        'as' => 'admin.blog.show',
        'uses' => 'BlogController@show'
    ]);
    Route::any('/admin/blog-delete/{id}', [
        'as' => 'admin.blog.delete',
        'uses' => 'BlogController@destroy'
    ]);


    /*------------- Today Class --------------*/


    Route::any('/admin/today-class', [
        'as' => 'admin.todayclass',
        'uses' => 'TodayClassController@index'
    ]);
    Route::post('/admin/todayclass/search', [
        'as' => 'admin.todayclass.search',
        'uses' => 'TodayClassController@dropdownSearch'
    ]);

    Route::get('/admin/today-class/add', [
        'as' => 'admin.todayclass.create',
        'uses' => 'TodayClassController@create'
    ]);
    Route::post('/admin/today-class/add', [
        'as' => 'admin.todayclass.store',
        'uses' => 'TodayClassController@store'
    ]);

    Route::get('/admin/today-class/edit/{id}', [
        'as' => 'admin.todayclass.edit',
        'uses' => 'TodayClassController@edit'
    ]);
    Route::post('/admin/today-class/update/{id}', [
        'as' => 'admin.todayclass.update',
        'uses' => 'TodayClassController@update'
    ]);
    Route::any('/admin/today-class/delete/{id}', [
        'as' => 'admin.todayclass.delete',
        'uses' => 'TodayClassController@destroy'
    ]);
    Route::get('/admin/today-class/title-search', [
        'as' => 'admin.todayclass.title.search',
        'uses' => 'TodayClassController@videoTitleSearch'
    ]);


    /*------------- Notice --------------*/

    Route::get('/admin/notice', [
        'as' => 'admin.notice',
        'uses' => 'NoticeController@index'
    ]);
    Route::get('/admin/notice/add', [
        'as' => 'admin.notice.create',
        'uses' => 'NoticeController@create'
    ]);
    Route::post('/admin/notice/add', [
        'as' => 'admin.notice.store',
        'uses' => 'NoticeController@store'
    ]);
    Route::get('/admin/notice/show/{id}', [
        'as' => 'admin.notice.show',
        'uses' => 'NoticeController@show'
    ]);
    Route::get('/admin/notice/edit/{id}', [
        'as' => 'admin.notice.edit',
        'uses' => 'NoticeController@edit'
    ]);
    Route::post('/admin/notice/edit/{id}', [
        'as' => 'admin.notice.update',
        'uses' => 'NoticeController@update'
    ]);
    Route::any('/admin/notice/delete/{id}', [
        'as' => 'admin.notice.delete',
        'uses' => 'NoticeController@destroy'
    ]);

    /*------------- Payment method --------------*/
    Route::get('/admin/payment', [
        'as' => 'admin.payment',
        'uses' => 'PaymentInfoController@index'
    ]);

    Route::get('/admin/payment/add', [
        'as' => 'admin.payment.create',
        'uses' => 'PaymentInfoController@create'
    ]);
    Route::post('/admin/payment/store', [
        'as' => 'admin.payment.store',
        'uses' => 'PaymentInfoController@store'
    ]);
    Route::get('/admin/payment/edit/{id}', [
        'as' => 'admin.payment.edit',
        'uses' => 'PaymentInfoController@edit'
    ]);
    Route::post('/admin/payment/edit/{id}', [
        'as' => 'admin.payment.update',
        'uses' => 'PaymentInfoController@update'
    ]);

    Route::any('/admin/payment/delete/{id}', [
        'as' => 'admin.payment.delete',
        'uses' => 'PaymentInfoController@destroy'
    ]);

    Route::get('/admin/payment/search', [
        'as' => 'admin.payment.search',
        'uses' => 'PaymentInfoController@userNameOrIdSearch'
    ]);
    /*-------------Word Book --------------*/

    Route::get('/admin/wordbook', [
        'as' => 'admin.wordbook',
        'uses' => 'WordbookController@index'
    ]);
    Route::get('/admin/wordbook/add', [
        'as' => 'admin.wordbook.create',
        'uses' => 'WordbookController@create'
    ]);
    Route::post('/admin/wordbook/store', [
        'as' => 'admin.wordbook.store',
        'uses' => 'WordbookController@store'
    ]);
    Route::get('/admin/wordbook/edit/{id}', [
        'as' => 'admin.wordbook.edit',
        'uses' => 'WordbookController@edit'
    ]);
    Route::post('/admin/wordbook/edit/{id}', [
        'as' => 'admin.wordbook.update',
        'uses' => 'WordbookController@update'
    ]);
    Route::any('/admin/wordbook/delete/{id}', [
        'as' => 'admin.wordbook.delete',
        'uses' => 'WordbookController@destroy'
    ]);

/*-------------Arabic Dictionary --------------*/

    Route::get('/admin/arabic-dictionary', [
        'as' => 'admin.arabic-dictionary',
        'uses' => 'ArabicDictionaryController@index'
    ]);
    Route::get('/admin/arabic-dictionary/add', [
        'as' => 'admin.arabic-dictionary.create',
        'uses' => 'ArabicDictionaryController@create'
    ]);
    Route::post('/admin/arabic-dictionary/store', [
        'as' => 'admin.arabic-dictionary.store',
        'uses' => 'ArabicDictionaryController@store'
    ]);
    Route::get('/admin/arabic-dictionary/edit/{id}', [
        'as' => 'admin.arabic-dictionary.edit',
        'uses' => 'ArabicDictionaryController@edit'
    ]);
    Route::post('/admin/arabic-dictionary/edit/{id}', [
        'as' => 'admin.arabic-dictionary.update',
        'uses' => 'ArabicDictionaryController@update'
    ]);
    Route::any('/admin/arabic-dictionary/delete/{id}', [
        'as' => 'admin.arabic-dictionary.delete',
        'uses' => 'ArabicDictionaryController@destroy'
    ]);

    /*------------- Result --------------*/

    Route::get('/admin/result', [
        'as' => 'admin.result',
        'uses' => 'ResultController@index'
    ]);
    Route::get('/admin/result/add', [
        'as' => 'admin.result.create',
        'uses' => 'ResultController@create'
    ]);
    Route::post('/admin/result/store', [
        'as' => 'admin.result.store',
        'uses' => 'ResultController@store'
    ]);
    Route::any('/admin/result/delete/{id}', [
        'as' => 'admin.result.delete',
        'uses' => 'ResultController@destroy'
    ]);
    Route::get('/admin/result/edit/{id}', [
        'as' => 'admin.result.edit',
        'uses' => 'ResultController@edit'
    ]);
    Route::post('/admin/result/edit/{id}', [
        'as' => 'admin.result.update',
        'uses' => 'ResultController@update'
    ]);


    /*------------- Audio --------------*/

    Route::get('/admin/audio', [
        'as' => 'admin.audio',
        'uses' => 'AudioController@index'
    ]);
    Route::get('/admin/audio/add', [
        'as' => 'admin.audio.create',
        'uses' => 'AudioController@create'
    ]);
    Route::post('/admin/audio/store', [
        'as' => 'admin.audio.store',
        'uses' => 'AudioController@store'
    ]);
    Route::any('/admin/audio/delete/{id}', [
        'as' => 'admin.audio.delete',
        'uses' => 'AudioController@destroy'
    ]);

    Route::get('/admin/audio/edit/{id}', [
        'as' => 'admin.audio.edit',
        'uses' => 'AudioController@edit'
    ]);
    Route::post('/admin/audio/edit/{id}', [
        'as' => 'admin.audio.update',
        'uses' => 'AudioController@update'
    ]);

    /*------------- Question --------------*/

    Route::get('/admin/question', [
        'as' => 'admin.question',
        'uses' => 'QuestionController@index'
    ]);
    Route::get('/admin/question/add', [
        'as' => 'admin.question.create',
        'uses' => 'QuestionController@create'
    ]);
    Route::post('/admin/question/store', [
        'as' => 'admin.question.store',
        'uses' => 'QuestionController@store'
    ]);
    Route::any('/admin/question/delete/{id}', [
        'as' => 'admin.question.delete',
        'uses' => 'QuestionController@destroy'
    ]);

    Route::get('/admin/question/edit/{id}', [
        'as' => 'admin.question.edit',
        'uses' => 'QuestionController@edit'
    ]);
    Route::post('/admin/question/edit/{id}', [
        'as' => 'admin.question.update',
        'uses' => 'QuestionController@update'
    ]);
    /*------------- Exam --------------*/

    Route::get('/admin/exam', [
        'as' => 'admin.exam',
        'uses' => 'ExamController@index'
    ]);
    Route::get('/admin/exam/add', [
        'as' => 'admin.exam.create',
        'uses' => 'ExamController@create'
    ]);
    Route::post('/admin/exam/store', [
        'as' => 'admin.exam.store',
        'uses' => 'ExamController@store'
    ]);
    Route::any('/admin/exam/delete/{id}', [
        'as' => 'admin.exam.delete',
        'uses' => 'ExamController@destroy'
    ]);

    Route::get('/admin/exam/edit/{id}', [
        'as' => 'admin.exam.edit',
        'uses' => 'ExamController@edit'
    ]);
    Route::post('/admin/exam/edit/{id}', [
        'as' => 'admin.exam.update',
        'uses' => 'ExamController@update'
    ]);

/*------------- eBook --------------*/

    // Route::get('/admin/ebook', [
    //     'as' => 'admin.ebook',
    //     'uses' => 'EbookController@index'
    // ]);
    // Route::get('/admin/ebook/add', [
    //     'as' => 'admin.ebook.create',
    //     'uses' => 'EbookController@create'
    // ]);
    /*demo of above*/

    // Route::get('/admin/ebook/adddemo', [
    //     'as' => 'admin.ebook.createdemo',
    //     'uses' => 'EbookController@createDemo'
    // ]);
    /*end*/
    // Route::post('/admin/ebook/store', [
    //     'as' => 'admin.ebook.store',
    //     'uses' => 'EbookController@store'
    // ]);
    // Route::any('/admin/ebook/delete/{id}', [
    //     'as' => 'admin.ebook.delete',
    //     'uses' => 'EbookController@destroy'
    // ]);

    // Route::get('/admin/ebook/edit/{id}', [
    //     'as' => 'admin.ebook.edit',
    //     'uses' => 'EbookController@edit'
    // ]);
    // Route::post('/admin/ebook/edit/{id}', [
    //     'as' => 'admin.ebook.update',
    //     'uses' => 'EbookController@update'
    // ]);

    // Route::get('/admin/ebook/show/{id}', [
    //     'as' => 'admin.ebook.show',
    //     'uses' => 'EbookController@show'
    // ]);
    /*------------- 2nd eBook --------------*/

    Route::get('/admin/ebook',[
        'as'   => 'admin.ebook',
        'uses' => 'SecondEbookController@index'
    ]);
    Route::get('/admin/ebook/add',[
        'as'   => 'admin.secondebook.create',
        'uses' => 'SecondEbookController@create'
    ]);
    Route::post('/admin/ebook/store',[
        'as'   => 'admin.secondebook.store',
        'uses' => 'SecondEbookController@store'
    ]);
    Route::any('/admin/ebook/delete/{id}',[
        'as'   => 'admin.secondebook.delete',
        'uses' => 'SecondEbookController@destroy'
    ]);

    Route::get('/admin/ebook/edit/{id}',[
        'as' => 'admin.secondebook.edit',
        'uses' => 'SecondEbookController@edit'
    ]);
    Route::post('/admin/ebook/edit/{id}',[
        'as' => 'admin.secondebook.update',
        'uses' => 'SecondEbookController@update'
    ]);

    Route::get('/admin/ebook/show/{id}',[
        'as' => 'admin.secondebook.show',
        'uses' => 'SecondEbookController@show'
    ]);
    
     /*------------- Pledge User  --------------*/
     Route::get('/admin/pledge-user', [
        'as' => 'admin.pledge.user',
        'uses' => 'FundPledgeController@index'
    ]);

    Route::get('/admin/pledge-user/{id}', [
        'as' => 'admin.pledge.show',
        'uses' => 'FundPledgeController@show'
    ]);

    Route::any('/admin/pledge-delete/{id}', [
        'as' => 'admin.pledge.delete',
        'uses' => 'FundPledgeController@destroy'
    ]);

    Route::get('/admin/pledge-user/edit/{id}', [
        'as' => 'admin.pledge.edit',
        'uses' => 'FundPledgeController@edit'
    ]);
    Route::post('/admin/pledge-user/update/{id}', [
        'as' => 'admin.pledge.update',
        'uses' => 'FundPledgeController@update'
    ]);

});

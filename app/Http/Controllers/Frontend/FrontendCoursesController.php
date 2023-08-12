<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseDetails;
Use App\Course;

class FrontendCoursesController extends Controller
{
    
    public function quranTeachingCourse() {

        $quranCourse = CourseDetails::where('is_active',1)->where('course_name', 'Quran Teaching Course')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();    

        return view('frontend.pages.courses.quran_teaching_course', compact('quranCourse','courses'));
    }

    public function arabicLanguageCourses() {
        $arabicCourse = CourseDetails::where('is_active',1)->where('course_name', 'Arabic Language Teaching course')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.arabic_language_course', compact('arabicCourse','courses'));

    }

     public function amparra() {

        $amparra = CourseDetails::where('is_active',1)->where('course_name', 'Amparra')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.amparra', compact('amparra','courses'));

    }

    public function kaidah() {

        $kaidah = CourseDetails::where('is_active',1)->where('course_name', 'Kaidah')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.kaidah', compact('kaidah','courses'));
    }

    public function najerah() {

        $najerah = CourseDetails::where('is_active',1)->where('course_name', 'Najerah')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.najerah', compact('najerah','courses'));
    }

    public function preHifz() {

        $preHifz = CourseDetails::where('is_active',1)->where('course_name', 'Pre-Hifz')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.pre_hifz', compact('preHifz','courses'));
    }
    
     public function hifjulQuran() {

        $hifjulQuran = CourseDetails::where('is_active',1)->where('course_name', 'Hifjul Quran')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.hifjul_quran', compact('hifjulQuran','courses'));
    }
    
    public function hifjulQuranMale() {

        $hifjulQuranMale = CourseDetails::where('is_active',1)->where('course_name', 'Hifjul Quran for Male')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  
        //dd($hifjulQuranMale);
        return view('frontend.pages.courses.hifjul_quran_male', compact('hifjulQuranMale','courses'));
    }
    
    public function hifjulQuranFemale() {

        $hifjulQuranFemale = CourseDetails::where('is_active',1)->where('course_name', 'Hifjul Quran for Female')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.hifjul_quran_female', compact('hifjulQuranFemale','courses'));
    }
    
    public function islamicStudy () {

        $islamicStudy = CourseDetails::where('is_active',1)->where('course_name', 'Islamic Studies')->first();
        $courses = Course::where('is_active',1)->orderBy('id','desc')->get();  

        return view('frontend.pages.courses.islamic_study', compact('islamicStudy','courses'));
    }
   
}

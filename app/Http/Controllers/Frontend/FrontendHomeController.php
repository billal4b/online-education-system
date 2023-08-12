<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;
Use App\Photo;
Use App\Blog;
Use App\Course;

class FrontendHomeController extends Controller
{
    
    public function index()
    {
        $sliderImage = Photo::where('is_active',1)->where('image_type', 'banner')->get();
        $blogs = Blog::select('id','title','excerpt','slug','date_time','image','is_active')
                ->where('is_active',1)
                ->orderBy('date_time', 'desc')
                ->limit(3)
                ->get();
        $courses = Course::where('is_active',1)->orderBy('order','asc')->get();   
        $aboutUs = Content::where('is_active',1)->where('section_name', 'About Us')->where('title', 'IQS')->first();
        $header  = Content::where('is_active',1)->where('section_name', 'Header Title')->first();
        $apply   = Content::where('is_active',1)->where('section_name', 'Admission')->first();

        return view('frontend.template', compact('sliderImage','blogs','courses','aboutUs','header','apply'));
    }

   

    // public function aboutUs()
    // {
    //     return view('frontend.pages.about_us');

    // }
    public function courses()
    {
        return view('frontend.pages.courses');

    }
    public function coursesDetail()
    {
        return view('frontend.pages.courses_detail');

    }
  
    public function contactUs()
    {
        return view('frontend.pages.contact_us');

    }
  
   
}

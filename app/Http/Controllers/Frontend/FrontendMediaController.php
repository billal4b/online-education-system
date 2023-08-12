<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Media;
Use App\Course;
Use App\Photo;
use App\Audio;
use App\FilePdf;

class FrontendMediaController extends Controller
{


    public function video()
    {
        //$courses = Course::where('is_active',1)->pluck('course_name','id')->all();
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        //dd($courses);

        $course_id = auth()->user()->select_course;

        if( auth()->user()->is_admin == 1 ) {

            $videos = Media::with('courses')
                    ->orderBy('id', 'desc')
                    ->where('is_active',1)
                    ->where('status', 1)
                    ->where('file_type', 'video')
                    ->select('id','title','course_id','video','order','is_active')
                    ->paginate(12);


        } else {

            $videos = Media::with('courses')
                    ->orderBy('id', 'desc')
                    ->where('is_active',1)
                    ->where('status', 1)
                    ->where('file_type', 'video')
                    ->whereIn('course_id', $course_id)
                    ->select('id','title','course_id','video','order','is_active')
                    ->paginate(9);
        }

        return view('frontend.pages.video',compact('courses','videos'));
    }



//   public function sheet()
//     {
//         $courses = Course::where('is_active',1)->pluck('course_name','id')->all();
//       // $course_name = auth()->user()->course_title;
//         $course_name = auth()->user()->select_course;

//         if( auth()->user()->is_admin == 1 ) {

//             $sheets = Media::select('id','title','course_title','course','pdf','order','is_active')
//                     ->where('is_active',1)
//                     ->where('file_type', 'pdf')
//                     ->orderBy('id', 'desc')
//                     ->orderBy('order', 'desc')
//                     ->paginate(12);

//         }else{

//             $sheets = Media::select('id','title','course_title','course','pdf','order','is_active')
//                     ->where('is_active',1)
//                     ->where('file_type', 'pdf')
//                     ->whereIn('course_title', $course_name)
//                     ->orderBy('id', 'desc')
//                     ->paginate(9);
//         }
//         return view('frontend.pages.pdf',compact('courses','sheets'));
//     }


    public function gallery()
    {
        $galleryImage = Photo::where('is_active',1)->where('image_type','gallery')->get();

        return view('frontend.pages.gallery',compact('galleryImage'));
    }

     public function audio()
    {
       $audios = Audio::orderBy('id', 'desc')
                ->where('is_destroy',1)
                ->where('is_active',1)
                ->paginate(20);
        return view('frontend.pages.audio',compact('audios'));
    }

   public function sheet()
    {
        $courses = Course::where('is_active',1)->pluck('course_name','id')->all();
        $course_id = auth()->user()->select_course;

        if( auth()->user()->is_admin == 1 ) {

            $lastPdf = FilePdf::with('courses')->orderBy('id', 'desc')->where('is_active', 1)->first();
            $data = FilePdf::with('courses')->orderBy('id', 'desc')
                ->where('is_active', 1)
                ->where('id', '!=', $lastPdf->id )
                ->paginate(30);
        } else {
            
            $lastPdf = FilePdf::with('courses')->where('is_active', 1)
            ->whereIn('course_id', $course_id)
            ->where('is_active', 1)
            ->first();
            
            if (empty($lastPdf)) {
                $data = null;
            } else {
                $data = FilePdf::with('courses')->orderBy('id', 'desc')
                ->whereIn('course_id', $course_id)
                ->where('is_active', 1)
                ->where('id', '!=', $lastPdf->id )
                ->paginate(30);
            } 
        }
        return view('frontend.pages.pdf',compact('courses','data', 'lastPdf'));
    }

    public function pdfDetails($slug)
    {
        $course_id = auth()->user()->select_course;

        if( auth()->user()->is_admin == 1 ) {
            $pdfDetails = FilePdf::whereSlug($slug)->first();
            $data = FilePdf::with('courses')->where('is_active', 1)->paginate(30);
        }else{
            $pdfDetails = FilePdf::with('courses')->whereSlug($slug)
                        ->whereIn('course_id', $course_id)
                        ->first();
            $data = FilePdf::with('courses')->where('is_active', 1)
                ->whereIn('course_id', $course_id)
                ->paginate(30);
        }
        return view('frontend.pages.pdfDetails', compact('data', 'pdfDetails'));
    }
}

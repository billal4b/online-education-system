<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Course;
use App\TodayClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;



class FrontendTodayClassController extends Controller
{
	public function index(Request $request)
    {
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        if (Auth::check()) {
            if(auth()->user()->is_admin == 1 ) {
                $crs = array_flip($courses);
                $firstC = array_shift($crs);
                //dd($firstC);
                $courseId = !empty($request->course_id) ? $request->course_id : $firstC;
                $genderId = !empty($request->gender) ? $request->gender : 'Male';
               // dd($courseId);
                $todC = TodayClass::with('courses')->where(function ($query) use ($courseId) {
                        if (!empty($courseId)) {
                            return $query->where('course_id', '=', $courseId);
                        }
                    })
                    ->where(function ($query) use ($genderId) {
                        if (!empty($genderId)) {
                            return $query->where('gender', '=', $genderId);
                        }
                    })
                    ->where('is_destroy', 1)
                    ->where('is_active', 1)
                    ->where('course_id', $courseId)
                    ->where('gender', $genderId)
                    ->where('today_class', 1)
                    ->select('video_title', 'video_url_id', 'course_id')
                    ->latest()
                    ->first();

                   // dd($todC);

                $preC = TodayClass::with('courses')->where(function ($query) use ($courseId) {
                        if (!empty($courseId)) {
                            return $query->where('course_id', '=', $courseId);
                        }
                    })
                    ->where(function ($query) use ($genderId) {
                        if (!empty($genderId)) {
                            return $query->where('gender', '=', $genderId);
                        }
                    })
                    ->where('is_destroy', 1)
                    ->where('is_active', 1)
                    ->where('course_id', $courseId)
                    ->where('gender', $genderId)
                    ->where('id','!=', $todC->id)
                    ->orderBy('id', 'desc')
                    ->select('video_title', 'video_url_id', 'course_id')
                    ->paginate(4);
                $preC->appends(request()->query())->links();
               // dd($preC);
                return view('frontend.pages.today.today_class_all', compact('courses', 'todC', 'preC', 'genderId', 'courseId'));

            } else {

                $gender = auth()->user()->gender;
                $course_id = auth()->user()->select_course;
                $select_course = array_filter(
                    $courses,
                    function ($key) use ($course_id) {
                        return in_array($key, $course_id);
                    },
                    ARRAY_FILTER_USE_KEY
                );
                //dd($select_course);
                $crs = array_flip($courses);
                $firstC = array_shift($crs);
                $courseId = !empty($request->course_id) ? $request->course_id : $firstC;
               // dd($courseId);

               $todC = TodayClass::with('courses')->where(function ($query) use ($courseId) {
                    if (!empty($courseId)) {
                        return $query->where('course_id', '=', $courseId);
                    }
                })
                    ->where('is_destroy', 1)
                    ->where('is_active', 1)
                    ->where('course_id', $courseId)
                    ->where('gender', $gender)
                    ->where('today_class', 1)
                    ->select('video_title', 'video_url_id', 'course_id', 'gender', 'course_id')
                    ->latest()
                    ->first();


                $preC = TodayClass::with('courses')->where(function ($query) use ($courseId) {
                    if (!empty($courseId)) {
                        return $query->where('course_id', '=', $courseId);
                    }
                })
                    ->where('is_destroy', 1)
                    ->where('is_active', 1)
                    ->where('course_id', $courseId)
                    ->where('gender', $gender)
                    ->where('id','!=', $todC->id)
                    ->orderBy('id', 'desc')
                    ->select('course_id', 'video_title', 'video_url_id', 'gender')
                    ->paginate(4);

                return view('frontend.pages.today.today_class_common', compact('todC', 'preC', 'select_course', 'courses','courseId', 'gender'));

            }

        } else {

            $course_id = Course::where('video_permission', 1)
                //->where('is_active', 1)
                //->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('id')
                ->all();
            //dd($course_id);
            $todC = TodayClass::where('is_destroy', 1)
                    ->whereIn('course_id', $course_id)
                    ->where('today_class', 1)
                    ->where('is_active', 1)
                    ->select('course_id', 'video_title', 'video_url_id', 'gender')
                    ->latest()
                    ->first();

            $preC = TodayClass::orderBy('id', 'desc')
                        ->whereIn('course_id', $course_id)
                        ->where('is_destroy', 1)
                        ->where('today_class', '!=', 1)
                        ->where('is_active', 1)
                        ->select('course_id', 'video_title', 'video_url_id', 'gender')
                        ->paginate(4);
                // dd($course_id);

            return view('frontend.pages.today.today_class_children', compact('courses','todC', 'preC'));
        }

    }

}

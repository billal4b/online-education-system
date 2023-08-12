<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodayClass;
use App\Course;


class TodayClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminmiddleware');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index(Request $request)
    {
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        //dd($courses);
        $genderId = $request->gender ?? null;
        $courseId = $request->course_id ?? null;
        $titleText = $request->title_text ?? null;
        $titleKey = $request->video_title ?? null;


        $data = TodayClass::with('courses')->where(function ($query) use ($courseId) {
            if (!empty($courseId)) {
                 return $query->where('course_id', '=', $courseId);
            }
        })
            ->where(function ($query) use ($genderId) {
                if (!empty($genderId)) {
                    return $query->where('gender', '=', $genderId);
                }
            })
            ->where(function ($query) use ($titleText) {
                if (!empty($titleText)) {
                    return $query->where('video_title', 'like', "%$titleText%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(25);

            $data->appends(request()->query())->links();
            //dd($data->toArray());
            return view('backend.today_class.index', compact('courses','data','courseId','genderId','titleText','titleKey'));
    }

    public function videoTitleSearch(Request $request)
    {
        $data = [];
        if (!empty($request->term)) {
            $searchKey = $request->term;
            $data['results'] = TodayClass::select(['id', 'video_title as text'])
                ->where('video_title', 'like', "%$searchKey%")
                ->groupBy('video_title')
                ->limit(10)
                ->get()
                ->toArray();
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('backend.today_class.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_title'  => 'required',
            //'course_title' => 'required',
            'course_id' => 'required',
            'video_url_id' => 'required',
        ]);

        $data = new TodayClass();
        $data->video_title  = $request->video_title;
        //$data->course_title = $request->course_title;
        $data->course_id = $request->course_id;
        $data->video_url_id = $request->video_url_id;
        $data->gender = $request->gender;
        $data->order = $request->order;
        $data->is_active = $request->is_active;
        $data->save();

        TodayClass::where('course_id', $request->course_id)
                ->where('gender', $request->gender)
                ->where('id', '!=', $data->id)
        ->chunkById(50, function ($flights) {
            $flights->each->update(['today_class' => 0]);
        });
        return redirect('/admin/today-class')->with('success', 'Saved Successfully!');

        // $input = $request->all();
        // //dd($input);
        // $input['course_title'] = $request->input('course_title');
        // TodayClass::create($input);

        // return redirect('/admin/today-class')->with('success', 'Saved Successfully!');

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
       $edit = TodayClass::findOrFail($id);
       $courses = Course::orderBy('order', 'desc')
            ->where('is_active', 1)
            ->where('category', 1)
            ->where('is_destroy', 1)
            ->pluck('course_name','id')
            ->all();
       return view('backend.today_class.edit', compact('edit','courses'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $request->validate([
        'video_title'  => 'required',
        //'course_title' => 'required',
        'course_id' => 'required',
        'video_url_id' => 'required',
       ]);

       $data = TodayClass::findOrFail($id);
       $data->video_title  = $request->video_title;
       //$data->course_title = $request->course_title;
       $data->course_id = $request->course_id;
       $data->video_url_id = $request->video_url_id;
       $data->gender       = $request->gender;
       $data->order        = $request->order;
       $data->is_active    = $request->is_active;
       $data->update();
       return redirect()->back()->with('success', 'updated Successfully!');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $todayClass = TodayClass::findOrFail($id);
       $todayClass->delete();

    //    if ($todayClass->is_destroy == 1) {
    //        $todayClass->is_destroy = 0;
    //    }
      //  $todayClass->save();
       return redirect()->back()->with('success', 'deleted Successfully!');
   }

    /**
    * Display a listing of the searching.
    *
    * @return \Illuminate\Http\Response
    */

    // public function dropdownSearch(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $query = $request->get('query');
    //         if ($query != '') {
    //             $data = TodayClass::orderBy('id', 'desc')
    //                 ->where('is_destroy', 1)
    //                 ->where('course_title', 'like', '%'.$query.'%')
    //                 ->paginate(20);
    //         } else {
    //             $data = TodayClass::orderBy('id', 'desc')
    //                 ->where('is_destroy', 1)
    //                 ->paginate(20);
    //         }
    //         $total_row = $data->count();
    //         if($total_row > 0) {
    //             foreach($data as $row) {
    //                 $output .= '
    //                 <tr>
    //                     <td>'.$row["video_title"].'</td>
    //                     <td>'.$row["course_title"].'</td>
    //                     <td>'.$row["order"].'</td>
    //                     <td>'.$row["gender"].'</td>
    //                     <td><span class=" '.($row['is_active'] == 1 ? 'paid' : 'cancel').' t-box"> '.($row['is_active'] == 1 ? 'Publish' : 'Unpublish').'</span>
    //                     </td>
    //                     <td>
    //                         <a href="'.route('admin.todayclass.edit', $row['id']).'" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
    //                         <a href="'.route('admin.todayclass.delete', $row['id']).'"" class="button gray"  ><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
    //                     </td>
    //                 </tr>
    //                 ';
    //             }
    //         } else {
    //             $output .= '
    //                 <tr>
    //                     <td colspan="5" align="center">No Data Found</td>
    //                 </tr>
    //                     ';
    //         }
    //         $data = $output;
    //         echo $data;
    //     }
    // }

}

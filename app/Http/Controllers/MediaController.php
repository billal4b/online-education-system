<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Media;
Use App\Course;
use Redirect;

class MediaController extends Controller
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
        //$data = Media::with('courses')->orderBy('id', 'desc')->where('status',1)->where('file_type', '!=', 'pdf')->paginate(20);
       // $courseList = Course::where('category', 1)->where('is_active', 1)->get();
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();

        $courseId = $request->course_id ?? null;
        $titleText = $request->title_text ?? null;
        $titleKey = $request->title ?? null;


        $data = Media::with('courses')->where(function ($query) use ($courseId) {
            if (!empty($courseId)) {
                    return $query->where('course_id', '=', $courseId);
            }
        })
            ->where(function ($query) use ($titleText) {
                if (!empty($titleText)) {
                    return $query->where('title', 'like', "%$titleText%");
                }
            })
            ->orderBy('id', 'desc')
            ->where('status',1)
            ->where('file_type', '!=', 'pdf')
            ->paginate(25);

            $data->appends(request()->query())->links();

        return view('backend.media.index', compact('data', 'courses', 'courseId', 'titleText', 'titleKey'));
    }

    public function mediatitleSearch(Request $request) {
        $data = [];
        if (!empty($request->term)) {
            $searchKey = $request->term;
            $data['results'] = Media::select(['id', 'title as text'])
                ->where('status',1)
                ->where('file_type', '!=', 'pdf')
                ->where('title', 'like', "%$searchKey%")
                ->groupBy('title')
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
        //$courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('backend.media.create', compact('courses'));
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
            'title' => 'required',
            'course_id' => 'required',
            'file_type'    => 'required',
        ]);

        //$input = $request->all();
        //dd($input);
        //Media::create($input);

        // foreach ($request->course_title as $course) {
        //     if(!empty($course)) {
        //         Media::create([
        //             'title' => $request->title,
        //             'course_title' => $course,
        //             'file_type' => $request->file_type,
        //             'video'   => $request->video,
        //             'audio' => $request->audio
        //         ]);

        //     }
        // }

        $input = $request->all();
        $input['course_id'] = $request->input('course_id');
        Media::create($input);

        return redirect('/admin/media')->with('success', 'saved Successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Media::findOrFail($id);
        //$courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('backend.media.edit', compact('edit','courses'));
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
            'title'     => 'required',
            'course_id' => 'required',
            'file_type' => 'required',
            'is_active' => 'required',
        ]);

        $media = Media::findOrFail($id);
        $media->title = $request->title;
        $media->course_id  = $request->course_id;
        //$media->course  = $request->course;
        $media->file_type  = $request->file_type;
        $media->video  = $request->video;
        $media->audio  = $request->audio;
        $media->order  = $request->order;
        $media->is_active  = $request->is_active;

        $media->update();
        return redirect('/admin/media')->with('success', 'updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        if ($media->status == 1) {
            $media->status = 0;
        }
        $media->save();

        return redirect()->back()->with('success', 'deleted Successfully!');
        //return redirect('/admin/media')->with('success', 'deleted Successfully!');
    }


//  public function dropdownSearch(Request $request)
//  {

//      if ($request->ajax()) {

//          $output = '';
//          $query = $request->get('query');

//          if ($query != '') {

//            $data = Media::orderBy('id', 'desc')
//                  ->where('status',1)
//                  ->where('file_type', '!=', 'pdf')
//                  ->where('course_id', 'like', '%'.$query.'%')
//                  ->paginate(20);

//          } else {

//              $data = Media::orderBy('id', 'desc')
//                  ->where('status',1)
//                  ->where('file_type', '!=', 'pdf')
//                  ->paginate(20);
//          }



//          $total_row = $data->count();

//          if($total_row > 0) {
//              $i=1;
//              foreach($data as $row) {
//                  $output .= '
//                  <tr>
//                      <td>'.$i++.'</td>
//                      <td>'.$row["title"].'</td>
//                      <td>'.$row["course_id"].'</td>
//                      <td>'.$row["order"].'</td>
//                      <td><span class=" '.($row['is_active'] == 1 ? 'paid' : 'cancel').' t-box"> '.($row['is_active'] == 1 ? 'Active' : 'Inactive').'</span>
//                      </td>
//                      <td>
//                          <a href="'.route('admin.media.edit', $row['id']).'" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>

//                          <a href="'.route('admin.media.delete', $row['id']).'"" class="button gray"  ><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>

//                      </td>

//                  </tr>
//                  ';
//              }
//          } else {
//              $output .= '
//                  <tr>
//                      <td colspan="5" align="center">No Data Found</td>
//                  </tr>
//                   ';
//          }
//          $data = $output;
//          echo $data;
//      }

//  }
}

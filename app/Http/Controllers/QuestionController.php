<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Question;

class QuestionController extends Controller
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
    public function index()
    {
        $data = Question::orderBy('id', 'desc')
                ->where('is_destroy',1)
                ->paginate(20);
        $courseList = Course::where('category', 1)
                    ->where('is_active', 1)
                    ->get();

        return view('backend.question.index', compact('data', 'courseList'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
        return view('backend.question.create', compact('courses'));
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
            'exam_title' => 'required',
            'course_title' => 'required',
            'question' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
        ]);


        $question = new Question;

        $inputDateTime = $request->start_time;
        $duration = $request->duration;
        $minutes_to_add = $duration * 60;
        $startDateTime = (new \DateTime($inputDateTime))->format('Y-m-d H:i:s');
        $endDateTime = (new \DateTime($inputDateTime))->add(new \DateInterval('PT' . $minutes_to_add . 'M'))->format('Y-m-d H:i:s');
       // dd( $startDateTime);

        $question->exam_title = $request->exam_title;
        $question->course_title = $request->course_title;
        $question->question = $request->question;
        $question->duration = $minutes_to_add;
        $question->start_time = $startDateTime;
        $question->end_time = $endDateTime;
       // $question->date_time = $request->date_time;
        $question->save();

        return redirect('/admin/question')->with('success', 'successfully Added Question.');

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
       $edit = Question::findOrFail($id);
       $courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
       return view('backend.question.edit', compact('edit','courses'));
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
            'exam_title' => 'required',
            'course_title' => 'required',
            'question' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
        ]);

        $question = Question::findOrFail($id);

        $inputDateTime = $request->start_time;
        $duration = $request->duration;
        $minutes_to_add = $duration * 60;
        $startDateTime = (new \DateTime($inputDateTime))->format('Y-m-d H:i:s');
        $endDateTime = (new \DateTime($inputDateTime))->add(new \DateInterval('PT' . $minutes_to_add . 'M'))->format('Y-m-d H:i:s');
       // dd( $startDateTime);

        $question->exam_title   = $request->exam_title;
        $question->course_title = $request->course_title;
        $question->question = $request->question;
        $question->duration = $minutes_to_add;
        $question->start_time = $startDateTime;
        $question->end_time   = $endDateTime;
        $question->is_active  = $request->is_active;
        $question->update();

        return redirect('/admin/question')->with('success', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Question::findOrFail($id);
        if ($media->is_destroy == 1) {
            $media->is_destroy = 0;
        }
        $media->save();

        return redirect('/admin/question')->with('success', 'Question has been deleted');
    }

}

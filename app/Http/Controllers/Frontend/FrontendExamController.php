<?php

namespace App\Http\Controllers\Frontend;

use App\Exam;
use App\User;
use App\Course;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FrontendExamController extends Controller
{
    public function exam(){
        $questions = Question::where('is_active', 1)->where('is_destroy', 1)->first();

        $user_id = auth()->user()->id;

        if( $questions == null){
            return view('frontend.pages.exam-not-start');
        }
        $exam_key = $questions->id;
        $existing = Exam::select('id','user_id','exam_key','is_enroll', 'is_active', 'is_destroy')->where('user_id', $user_id)->where('exam_key', $exam_key)->where('is_enroll', 1)->first();

        if($existing === null){

            $courses = Course::where('is_active',1)->where('category',1)->pluck('course_name','id')->all();
            $course_name = auth()->user()->select_course;

            if( auth()->user()->is_admin == 1 ) {
                $data = Question::where('is_active', 1)
                        ->where('is_destroy', 1)
                        ->first();
            } else {
                $data = Question::where('is_active', 1)
                        ->where('is_destroy', 1)
                        ->whereIn('course_title', $course_name)
                        ->first();
            }

            $q = $data['question'];
            $questions = array_filter(explode ("|| ", $q));
            // return view('frontend.pages.question-exam',compact('courses','data', 'questions'));
            return view('frontend.pages.exam-start',compact('courses','data', 'questions'));

        } else {
            return Redirect::route('exam.form', $existing['id']);
        }

    }

    public function examStart(Request $request) {
       // dd($request);

       foreach ( $request->get('question') as $q => $a) {
            $answers[] = [
                $q => $a,
            ];
        }
        $examAnswer = new Exam;
        $examAnswer->user_id = $request->user_id;
        $examAnswer->user_name = $request->user_name;
        $examAnswer->exam_title = $request->exam_title;
        $examAnswer->exam_key = $request->exam_key;
        $examAnswer->course_title = $request->course_title;
        $examAnswer->start_time = $request->start_time;
        $examAnswer->end_time = $request->end_time;
        $examAnswer->duration = $request->duration;
        $examAnswer->is_enroll = 1;
        $examAnswer->answer = $request->question;
        $examAnswer->answer = json_encode( $answers);
        $examAnswer->save();
        $examAnswer->id;
        $id = $examAnswer;
        return Redirect::route('exam.form', $id);

        //return redirect('/exam')->with('success', 'Your exam has been successfully completed!');

    //    for ($i = 0; $i < count($request->question); $i++) {

    //         $answers[] = [
    //             'user_id' =>$request->user_id,
    //             'user_name' =>$request->user_name,
    //             'exam_title' =>$request->exam_title,
    //             'course_title' =>$request->course_title,
    //             'answer' => $request->answer[$i],
    //             'question' => $request->question[$i]
    //         ];
    //     }
    //     Exam::insert($answers);
    //     return redirect('/exam-form');
    }


    public function examForm($id) {
        $data = Exam::findOrFail($id);
        $answer = $data->answer;
        return view('frontend.pages.exam-question', compact('data', 'answer'));
    }

    public function examSubmit(Request $request, $id)
    {
        foreach ( $request->get('question') as $q => $a) {
            $answers[] = [
                $q => $a,
            ];
        }
        $examAnswer = Exam::findOrFail($id);
        $examAnswer->answer = $request->question;
        $examAnswer->answer = json_encode( $answers);
        $examAnswer->update();

        return redirect()->back()->with('success', 'Answer Submitted!');

    }






    // public function examStore(Request $request) {
    //   //dd($request);

    //     foreach ( $request->get('question') as $q => $a) {
    //         $answers[] = [
    //             $q => $a,
    //         ];
    //     }
    //     $examAnswer = new Exam;
    //     $examAnswer->user_id = $request->user_id;
    //     $examAnswer->user_name = $request->user_name;
    //     $examAnswer->exam_title = $request->exam_title;
    //     $examAnswer->course_title = $request->course_title;
    //     $examAnswer->answer = $request->question;
    //     $examAnswer->answer = json_encode( $answers);
    //     $examAnswer->save();
    //     return redirect('/exam')->with('success', 'Your exam has been successfully completed!');

    // }


    // public function ajaxSendData(Request $request) {

    //     $reps_id = $request->get('id');
    //     $order = $request->get('order');
    //     $model = Exam::find($reps_id);
    //     if(!$model) {
    //         echo "Failed!";
    //         return;
    //     }

    //     $model->order = $order;
    //     if(!$model->save()) {
    //         die("Failed to save!");
    //     }

    //     echo "success";
    // }


}

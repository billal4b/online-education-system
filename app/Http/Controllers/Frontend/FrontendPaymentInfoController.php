<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentInfo;
use App\Course;
use App\User;

class FrontendPaymentInfoController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('frontend.pages.payment', compact('courses'));

    }

    public function store(Request $request) {
        $request->validate([
            //'student_name'  => 'required',
            'student_id'  => 'required',
            'payment_amount' => 'required',
            'course_title' => 'required',
            'transaction_id' => 'required',
           // 'contact' => 'required|min:11|max:11',
        ]);
        
        $userID = User::where('user_id', '=', $request->input('student_id'))->first();

        if ($userID != null) {

            $create = [
                //'student_name'   => $request->student_name,
                'user_id'   => $request->student_id,
                'payment_method' => $request->payment_method,
                'payment_amount' => $request->payment_amount,
                'transaction_id' => $request->transaction_id,
                'date_time'      => $request->date_time,
                'course_title'   => $request->course_title,
                //'batch_id'       => $request->batch_id,     
                'contact'       => $request->contact, 
            ];    
            PaymentInfo::create($create);
            return back()->with('success','Payment Info Send Successfully!');
        } else {
            return back()->with('error','Student ID is Wrong!');
        }
    }
}

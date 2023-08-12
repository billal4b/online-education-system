<?php

namespace App\Http\Controllers;

use App\Course;
use App\PaymentInfo;
use App\User;
use Illuminate\Http\Request;

class PaymentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();

        $courseId = $request->course_title ?? null;
        $nameText = $request->name_text ?? null;
        $nameKey = $request->student_id ?? null;
        $dateRange = $request->daterange??null;
        $dateRangeArr = null;
        $startDate = null;
        $endDate = null;

        if (!empty($dateRange)) {
            $dateRangeArr = explode('to',$dateRange);
            $startDate = \date('Y-m-d', strtotime(trim($dateRangeArr[0]))) . ' 00:00:00';
            $endDate = \date('Y-m-d', strtotime(trim($dateRangeArr[1]))) . ' 23:59:59';
        }

        $data = PaymentInfo::where(function ($query) use ($courseId) {
                if (!empty($courseId)) {
                    return $query->whereRaw("find_in_set($courseId, course_title)");
                }
            })          
            ->where(function ($query) use ($startDate, $endDate) {
                if (!empty($startDate) && !empty($endDate)) {
                    return $query->whereBetween('date_time', [$startDate, $endDate]);
                }
            })
            ->where(function ($query) use ($nameText) {
                if (!empty($nameText)) {
                    return $query->where('user_id', 'like', "%$nameText%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

            $data->appends(request()->query())->links();
            //dd($data->toArray());
            return view('backend.payment.index', compact('courses','data','courseId','dateRange','nameText','nameKey'));

        //$data = PaymentInfo::where('is_destroy', 1)->orderBy('id', 'desc')->paginate(30);
       // return view('backend.payment.index', compact('data', 'courses'));
    }

    public function userNameOrIdSearch(Request $request)
    {
        $data = [];
        if (!empty($request->term)) {
            $searchKey = $request->term;
            $data['results'] = PaymentInfo::select(['id', 'user_id as text'])
                ->where('user_id', 'like', "%$searchKey%")
                ->groupBy('user_id')
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
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('backend.payment.create', compact('courses'));
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
            'student_id'     => 'required',
            'payment_amount' => 'required',
            'course_title'   => 'required',
            'transaction_id' => 'required',     
        ]);
       
        $userID = User::where('user_id', '=', $request->input('student_id'))->first();

        if ($userID != null) {
            $paymentInfo = new PaymentInfo;  
            $paymentInfo->student_name = $request->student_name;
            $paymentInfo->user_id = $request->student_id;
            $paymentInfo->payment_method = $request->payment_method;
            $paymentInfo->payment_amount = $request->payment_amount;
            $paymentInfo->transaction_id = $request->transaction_id;
            $paymentInfo->date_time = $request->date_time;
            $paymentInfo->course_title = $request->course_title;
        // $paymentInfo->batch_id = $request->batch_id;
            $paymentInfo->contact = $request->contact;       
            $paymentInfo->save();
            return redirect('/admin/payment')->with('success', ' Successfully saved!');  
        } else {
            return back()->with('error','Student ID is Wrong!');
        }
         
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $edit = PaymentInfo::findOrFail($id);       
        $courses = Course::orderBy('order', 'desc')
        ->where('is_active', 1)
        ->where('is_destroy', 1)
        ->pluck('course_name','id')
        ->all();
        return view('backend.payment.edit', compact('edit', 'courses'));
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
            'student_id'     => 'required',
            'payment_amount' => 'required',
            'course_title'   => 'required',
            'transaction_id' => 'required', 
        ]);

        $userID = User::where('user_id', '=', $request->input('student_id'))->first();

        if ($userID != null) {
            $paymentInfo = PaymentInfo::findOrFail($id);  
            $paymentInfo->student_name = $request->student_name;
            $paymentInfo->user_id = $request->student_id;
            $paymentInfo->payment_method = $request->payment_method;
            $paymentInfo->payment_amount = $request->payment_amount;
            $paymentInfo->transaction_id = $request->transaction_id;
            $paymentInfo->date_time = $request->date_time;
            $paymentInfo->course_title = $request->course_title;
        // $paymentInfo->batch_id = $request->batch_id;
            $paymentInfo->contact = $request->contact; 
            $paymentInfo->update();
            return redirect('/admin/payment')->with('success', 'Successfully updated!');
        } else {
            return back()->with('error','Student ID is Wrong!');
        }
    }


     /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $payment = PaymentInfo::findOrFail($id);
       $payment -> delete();
    //    if ($payment->is_destroy == 1) {
    //        $payment->is_destroy = 0;
    //    }
    //    $payment->save();

       //return redirect('/admin/media')->with('success', 'File has been deleted');
       return redirect()->back()->with('success', 'deleted Successfully!');
   }
}

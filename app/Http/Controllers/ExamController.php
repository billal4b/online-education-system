<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;


class ExamController extends Controller
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
        $data = Exam::orderBy('id', 'desc')
                ->where('is_destroy', 1)
                ->paginate(20);

        return view('backend.exam.index', compact('data'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
       $edit = Exam::findOrFail($id);
       $answer = $edit->answer;
       //dd($answer);
       return view('backend.exam.edit', compact('edit', 'answer'));
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
        $examAnswer = Exam::findOrFail($id);

       // $examAnswer->answer = $request->answer;
        $examAnswer->marks = $request->marks;
        $examAnswer->is_active  = $request->is_active;
        $examAnswer->update();

        return redirect('/admin/exam')->with('success', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Exam::findOrFail($id);
        if ($media->is_destroy == 1) {
            $media->is_destroy = 0;
        }
        $media->save();

        return redirect('/admin/exam')->with('success', 'Exam Answer has been deleted');
    }

}

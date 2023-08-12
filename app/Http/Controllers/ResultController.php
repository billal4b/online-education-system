<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
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
        $data = Result::orderBy('id', 'desc')->where('is_destroy', 1)->paginate(20);
        return view('backend.result.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.result.create');
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
            'course_title' => 'required', 
            'exam_name' => 'required', 
            'pdf_file' => 'required', 
        ]);         
       
         if($file = $request->file('pdf_file')) {

            $name = implode('_',explode(' ',$request->exam_name));
            $name = time().'_'.$name.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/result');
            $file->move($destinationPath, $name); 
            
        }
        Result::create([
            'course_title' => $request->course_title,
            'exam_name' => $request->exam_name,
            'subject_name' => $request->subject_name,
            'pdf_file' => $name        
        ]);
      
        return redirect('/admin/result')->with('success', 'Saved Successfully!');    
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
       $edit = Result::findOrFail($id);
       return view('backend.result.edit', compact('edit'));
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
        'course_title' => 'required', 
        'exam_name' => 'required',         
    ]);

       $result = Result::findOrFail($id);
       $result->course_title  = $request->course_title;
       $result->exam_name = $request->exam_name;
       $result->subject_name = $request->subject_name;

       if($file = $request->file('pdf_file')) {
            $name = implode('_',explode(' ',$request->exam_name));
            $name = time().'_'.$name.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/result');
            $file->move($destinationPath, $name);     
            $result->pdf_file = $name;    
        }
       $result->update();
       return redirect('/admin/result')->with('success', 'Updated Successfully!');
       //return redirect()->back()->with('success', 'updated Successfully!');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Result::findOrFail($id);
        if ($data->is_destroy == 1) {
           $data->is_destroy = 0;
        }
       $data->save();
       return redirect()->back()->with('success', 'deleted Successfully!');
    }
}

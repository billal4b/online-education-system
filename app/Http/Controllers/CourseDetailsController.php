<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseDetails;
Use App\Course;

class CourseDetailsController extends Controller
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

        $courses = CourseDetails::all();
        return view('backend.course_details.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('order', 'desc')->where('is_active', 1)->get(); 
        return view('backend.course_details.create', compact('courses'));
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
            'course_name'    => 'required|unique:course_details',  
            'is_active'      => 'required',         
        ]);

        $courseInfo = new CourseDetails();            
        $courseInfo->course_name = $request->course_name;
        $courseInfo->course_details = $request->course_details;            
        $courseInfo->course_details_bd = $request->course_details_bd;
        $courseInfo->is_active = $request->is_active;
        $courseInfo->save();

        return redirect('/admin/course-details')->with('success', 'Course Information has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::where('is_active', 1)->get(); 
        $edit = CourseDetails::findOrFail($id);
        return view('backend.course_details.edit', compact('edit','courses'));
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
            'course_name' => 'required',
            'is_active'   => 'required',
        ]);
        $courseInfo = CourseDetails::findOrFail($id);  
        $courseInfo->course_name = $request->course_name;
        $courseInfo->course_details = $request->course_details;            
        $courseInfo->course_details_bd = $request->course_details_bd;
        $courseInfo->is_active = $request->is_active;
        $courseInfo->update();

        return redirect('/admin/course-details')->with('success', 'Course Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = CourseDetails::findOrFail($id);
        $section->delete();

        return redirect('/admin/course-details')->with('success', 'Course Information has been deleted');
    }
}

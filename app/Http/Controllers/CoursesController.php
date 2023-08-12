<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Course;

class CoursesController extends Controller
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
        $courses = Course::orderBy('order', 'desc')->get();
        return view('backend.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create');
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
            'course_name' => ['required','unique:courses'],           
        ]);

        $courses = new Course;  
        $url     = implode('-',explode(' ',$request->course_name)); 
        $courses->course_name = $request->course_name;
        $courses->url = strtolower($url);

        if( $file = $request->file('image')) {             
            $imgname = time().'.'.$file->getClientOriginalExtension();   
            $destinationPath = public_path('/images/courses/thumb');             
            $img = Image::make($file->path());
            $img->resize(64, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imgname);
    
            $destinationPath = public_path('/images/courses/');
            $file->move($destinationPath, $imgname);            
           
            $courses->image   = $imgname;
            $courses->thumb   = $imgname;                                      
        }  
        $courses->save();
        return redirect('/admin/course')->with('success', 'Course Name has been saved!');   
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $edit = Course::findOrFail($id);
        return view('backend.courses.edit', compact('edit'));
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

        $courses = Course::findOrFail($id);  
        $url     = implode('-',explode(' ',$request->course_name)); 
        $courses->course_name = $request->course_name;
        $courses->category = $request->category;
        $courses->order = $request->order;
        $courses->is_active = $request->is_active;
        $courses->url = strtolower($url);

        if( $file = $request->file('image')) {             
            $imgname = time().'.'.$file->getClientOriginalExtension();   
            $destinationPath = public_path('/images/courses/thumb');             
            $img = Image::make($file->path());
            $img->resize(64, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imgname);
    
            $destinationPath = public_path('/images/courses/');
            $file->move($destinationPath, $imgname);              
           
            $courses->image   = $imgname;
            $courses->thumb   = $imgname; 
                                     
        }  
        $courses->update();
        return redirect('/admin/course')->with('success', 'Course Name has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Course::findOrFail($id);
        //$section->delete();
         if ($section->is_destroy == 1) {
           $section->is_destroy = 0;
        }

        return redirect('/admin/course')->with('success', 'Course Name has been deleted');
    }
}

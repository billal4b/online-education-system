<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Course;
use Illuminate\Http\Request;

class AudioController extends Controller
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
        $data = Audio::orderBy('id', 'desc')
                ->where('is_destroy',1)
                ->where('is_active',1)
                ->paginate(20);
        $courseList = Course::where('category', 1)
                    ->where('is_active', 1)
                    ->get();

        return view('backend.audio.index', compact('data', 'courseList'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
        return view('backend.audio.create', compact('courses'));
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
            'course_title' => 'required', 
            'audio_local' => 'required',
        ]);     
        
        if($file = $request->file('audio_local')) {

            $name = implode('_',explode(' ',$request->title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/audio'); 
            $file->move($destinationPath, $name); 
            $fileAudio = new Audio;
            $fileAudio->title = $request->title;
            $fileAudio->course_title = $request->course_title;
            $fileAudio->audio_local  = $name;   
            $fileAudio->save();

            return redirect('/admin/audio')->with('success', 'You have successfully upload Audio.');   
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
       $edit = Audio::findOrFail($id);
       $courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
       return view('backend.audio.edit', compact('edit','courses'));
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
            'title' => 'required',  
            'course_title' => 'required', 
        ]);

        $fileAudio = Audio::findOrFail($id);

        if($file = $request->file('audio_local')) {
            $name = implode('_',explode(' ',$request->title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/audio'); 
            $file->move($destinationPath, $name);            
            $fileAudio->audio_local  = $name;   
        }

        $fileAudio->title = $request->title;
        $fileAudio->course_title = $request->course_title;
        $fileAudio->is_active  = $request->is_active;       
        $fileAudio->update();

        return redirect('/admin/audio')->with('success', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Audio::findOrFail($id);
        if ($media->is_destroy == 1) {
            $media->is_destroy = 0;
        }
        $media->save();

        return redirect('/admin/audio')->with('success', 'File has been deleted');
    }

}

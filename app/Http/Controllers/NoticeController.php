<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Intervention\Image\Facades\Image;

class NoticeController extends Controller
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
        $notices = Notice::where('is_destroy', 0)->orderBy('publish_at', 'desc')->paginate(10);
        return view('backend.notice.index', compact('notices'));
      // return view('backend.notice.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.notice.create');
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
            'title'     => 'required', 
            'content'   => 'required',            
            'publish_at' => 'required', 
        ]);               

        $slug = implode('-',explode(' ',$request->title));

        $notice = new Notice();            
        $notice->title   = $request->title;
        $notice->slug     = strtolower($slug);
        $notice->content = $request->content;                  
        $notice->publish_at= $request->publish_at;
        $notice->is_active = $request->is_active;
       

       if( $file = $request->file('file')) { 
            // dd($request);
            $name = implode('_',explode(' ',$request->title));
            $name = $request->file_type.'_'.$name.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/notice');
            $file->move($destinationPath, $name);             
            $notice->file = $name;  
        }   
        $notice->save();
        return redirect('/admin/notice')->with('success', 'Notice has been Published!');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Notice::findOrFail($id);
        return view('backend.notice.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Notice::findOrFail($id);
        return view('backend.notice.edit', compact('edit'));
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
            'content'   => 'required',            
            'publish_at' => 'required', 
        ]);

        $slug = implode('-',explode(' ',$request->title)); 

        $notice = Notice::findOrFail($id);  
        $notice->title = $request->title;
        $notice->content = $request->content;      
        $notice->slug     = strtolower($slug);            
        $notice->publish_at= $request->publish_at;
        $notice->is_active = $request->is_active;

        if( $file = $request->file('file')) {         
            $name = implode('_',explode(' ',$request->title));
            $name = $request->file_type.'_'.$name.'.'.$file->getClientOriginalExtension();     
            $destinationPath = public_path('/notice');
            $file->move($destinationPath, $name);   

            $notice->file = $name; 
        } 
        
        $notice->update();    
        return redirect()->back()->with('success', 'Notice has been updated');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        //$notice->delete();
        if ($notice->is_destroy == 0) {
            $notice->is_destroy = 1;
        }
        $notice->save();
 
        //return redirect('/admin/media')->with('success', 'File has been deleted');
        return redirect()->back()->with('success', 'deleted Successfully!');
    }
}

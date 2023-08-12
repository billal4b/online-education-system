<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Content;
use App\Section;

class ContentController extends Controller
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
        $contents = Content::all();
        $section_list = Section::where('is_active',1)->pluck('section_name','id')->all();
        return view('backend.contents.index', compact('contents','section_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::enableQueryLog();
        // $arr_user = DB::table('users')->select('name', 'email as user_email')->get();
        // dd(DB::getQueryLog());        

        $sections = Section::where('is_active', 1)->get();  
        return view('backend.contents.create', compact('sections'));
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
            'section_name' => 'required', 
            'is_active' => 'required',                 
        ]); 
      
        $contentPost = new Content();            
        $contentPost->title   = $request->title;
        $contentPost->content = $request->content;
        $contentPost->section_name = $request->section_name;
        //$contentPost->image = $request->image;       
        $contentPost->is_active = $request->is_active;
        $contentPost->save();

        return redirect('/admin/content')->with('success', 'Post Content has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Content::findOrFail($id);
        $section = Section::where('is_active',1)->get();

        return view('backend.contents.show', compact('show','section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = Section::where('is_active', 1)->get();
        $edit = Content::findOrFail($id);
        return view('backend.contents.edit', compact('edit','sections'));
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
            'section_name' => 'required',
            'content'   => 'required',              
            'is_active' => 'required',          
        ]);

        $contentPost = Content::findOrFail($id);  
        $contentPost->title   = $request->title;
        $contentPost->section_name = $request->section_name;
        $contentPost->content = $request->content;  
        $contentPost->order   = $request->order;           
        $contentPost->is_active = $request->is_active;
        $contentPost->update(); 

        return redirect('/admin/content')->with('success', 'Content has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect('/admin/content')->with('success', 'Content has been deleted');
    }
    
}

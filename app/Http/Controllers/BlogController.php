<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.blog.create');
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
            'excerpt'   => 'required|max:255',
            'content'   => 'required', 
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_time' => 'required', 
            'is_active' => 'required',                 
        ]);               


       if( $file = $request->file('image')) { 
           
            // $imgname = $request->title.'_'.time().'.'.$file->getClientOriginalExtension(); 
            //$imgname = implode('_',explode(' ',$request->title));
            //$imgname = $imgname.'.'.$file->getClientOriginalExtension(); 
            $slug = implode('-',explode(' ',$request->title));
            $imgname = time().'.'.$file->getClientOriginalExtension();                 
            $destinationPath = public_path('/images/blog/thumb');            
            $img = Image::make($file->path());
            $img->resize(64, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imgname);
    
            $destinationPath = public_path('/images/blog/');
            $file->move($destinationPath, $imgname);
            
            $blog = new Blog();            
            $blog->title   = $request->title;
            $blog->excerpt = $request->excerpt;
            $blog->slug     = strtolower($slug);
            $blog->content = $request->content;            
            $blog->image   = $imgname;
            $blog->thumb   = $imgname;
            $blog->date_time = $request->date_time;
            $blog->is_active = $request->is_active;
            $blog->save();
            
        return redirect('/admin/blog')->with('success', 'Blog has been Published!');
        }   
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Blog::findOrFail($id);
        return view('backend.blog.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('edit'));
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
            'excerpt'   => 'required|max:255',
            'content'   => 'required', 
            'date_time' => 'required', 
            'is_active' => 'required',          
        ]);

        $blog = Blog::findOrFail($id);  
        $slug = implode('-',explode(' ',$request->title)); 
        $blog->title   = $request->title;
        $blog->excerpt = $request->excerpt;
        $blog->slug     = strtolower($slug);
        $blog->content = $request->content;        
        $blog->date_time = $request->date_time;
        $blog->is_active = $request->is_active;
     
        if( $file = $request->file('image')) {             
             $imgname = time().'.'.$file->getClientOriginalExtension();   
             $destinationPath = public_path('/images/blog/thumb');             
             $img = Image::make($file->path());
             $img->resize(64, 64, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$imgname);
     
             $destinationPath = public_path('/images/blog/');
             $file->move($destinationPath, $imgname);                   
            
             $blog->image   = $imgname;
             $blog->thumb   = $imgname;
                      
        }   
        $blog->update();    
        return redirect('/admin/blog')->with('success', 'Blog has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Blog::findOrFail($id);
        $content->delete();

        return redirect('/admin/blog')->with('success', 'Blog has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Photo;


class PhotoController extends Controller
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
        $images = Photo::all();
        return view('backend.image.index', compact('images'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {            
        return view('backend.image.create');
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
            'image_type' => 'required', 
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048', 
        ]);               


       if( $file = $request->file('image_name')) {            

           $name = implode('_',explode(' ',$request->title));
           $name = $request->image_type.'_'.$name.'.'.$file->getClientOriginalExtension();
        
            $destinationPath = public_path('/images/banner/thumb');            
            $img = Image::make($file->path());
            $img->resize(50, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$name);
    
            $destinationPath = public_path('/images/banner/');
            $file->move($destinationPath, $name);
            
            $photo = new Photo();            
            $photo->title = $request->title;
            $photo->image_type  = $request->image_type;
            $photo->image_name  = $name;
            $photo->image_thumb = $name;
            $photo->save();

            return redirect('/admin/image')->with('success', 'You have successfully upload image.');
        }    

    }

     /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {

        $image = Photo::findOrFail($request->id);
        $image->is_active = $request->is_active;
        $image->save();

        return redirect('/admin/image')->with('success', 'Status change successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Photo::findOrFail($id);
        $section->delete();

        return redirect('/admin/image')->with('success', 'Photo has been deleted');
    }
}

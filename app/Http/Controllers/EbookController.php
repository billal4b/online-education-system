<?php

namespace App\Http\Controllers;

use App\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
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
        $data = Ebook::orderBy('id', 'desc')->where('is_destroy', 1)->paginate(20);
        return view('backend.ebook.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ebook.create');
    }
    public function createDemo()
    {
        return view('backend.ebook.createdemo');
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
            'content' => 'required',
            'subject' => 'required',
        ]);
        $slug = implode('-',explode(' ',$request->subject));
        $oldSlag = $this->getRelatedSlugs($slug);

        $ebook = new Ebook();
        $ebook->course_title = $request->course_title;
        $ebook->subject = $request->subject;
        $ebook->subject_code = $request->subject_code;
        $ebook->content = $request->content;
        $ebook->section = $request->section;

        if($file = $request->file('pdf_file')) {
            $name = implode('_',explode(' ',$request->course_title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/ebook');
            $file->move($destinationPath, $name);
            $ebook->pdf_file = $name;
        }
        if(!empty($oldSlag)) {
            $Newslug = $slug.'-'.rand(1000,10000);
            $slug = $Newslug;
        }
        $ebook->slug = strtolower($slug);
        $ebook->save();

        return redirect('/admin/ebook')->with('success', 'Saved Successfully!');
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
       $edit = Ebook::findOrFail($id);
       return view('backend.ebook.edit', compact('edit'));
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
    ]);
       $slug = implode('-',explode(' ',$request->subject));
       $oldSlag = $this->getRelatedSlugs($slug);

       $ebook = Ebook::findOrFail($id);
       $ebook->course_title = $request->course_title;
       $ebook->subject_code = $request->subject_code;
       $ebook->subject = $request->subject;
       $ebook->content = $request->content;
       $ebook->section = $request->section;
       $ebook->is_active= $request->is_active;

       if($file = $request->file('pdf_file')) {
            $name = implode('_',explode(' ',$request->course_title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/ebook');
            $file->move($destinationPath, $name);
            $ebook->pdf_file = $name;
        }
        if(!empty($oldSlag)) {
            $Newslug = $slug.'-'.rand(1000,10000);
            $slug = $Newslug;
        }
        $ebook->slug = strtolower($slug);
       $ebook->update();
       return redirect('/admin/ebook')->with('success', 'Updated Successfully!');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ebook::findOrFail($id);
        if ($data->is_destroy == 1) {
           $data->is_destroy = 0;
        }
       $data->save();
       return redirect()->back()->with('success', 'deleted Successfully!');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show($id)
   {
       $show = Ebook::findOrFail($id);
       return view('backend.ebook.show', compact('show'));
   }

    protected function getRelatedSlugs($slug)
    {
        return Ebook::select('slug')->where('slug', 'like', $slug.'%')
            //->where('slug', 'like', '%'.$slug.'%')
            //->where('id', '<>', $id)
            ->first();
    }
}

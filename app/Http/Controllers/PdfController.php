<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Course;
Use App\FilePdf;
use Illuminate\Support\Facades\File;

class PdfController extends Controller
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
        $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        $medias = FilePdf::with('courses')
                ->orderBy('id', 'desc')
                ->paginate(25);
       // $courses = Course::where('is_active',1)->pluck('course_name','id')->all();

        return view('backend.pdf.index', compact('medias','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
       $courses = Course::where('is_active', 1)
                ->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();

        return view('backend.pdf.create', compact('courses'));
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
            'course_id' => 'required',
            'content' => 'required',
        ]);
        $slug = implode('-',explode(' ',$request->title));
        $oldSlag = $this->getRelatedSlugs($slug);

        $pdfFile = new FilePdf();
        $pdfFile->title = $request->title;
        $pdfFile->course_id = $request->course_id;
        //$pdfFile->subject = $request->subject;
        //$pdfFile->subject_code = $request->subject_code;
        $pdfFile->content = $request->content;

        if($file = $request->file('pdf_file')) {
            $name = implode('_',explode(' ',$request->title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/pdf');
            $file->move($destinationPath, $name);
            $pdfFile->pdf_file = $name;
        }
        if(!empty($oldSlag)) {
            $Newslug = $slug.'-'.rand(1000,10000);
            $slug = $Newslug;
        }
        $pdfFile->slug = strtolower($slug);
        $pdfFile->save();

        return redirect('/admin/pdf')->with('success', 'Saved Successfully!');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = FilePdf::findOrFail($id);
        //$courses = Course::orderBy('order', 'desc')->where('category', 1)->where('is_active', 1)->get();
        $courses = Course::where('is_active', 1)
        ->where('category', 1)
        ->where('is_destroy', 1)
        ->pluck('course_name','id')
        ->all();

        return view('backend.pdf.edit', compact('edit','courses'));
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
        $slug = implode('-',explode(' ',$request->title));
       $oldSlag = $this->getRelatedSlugs($slug);

       $ebook = FilePdf::findOrFail($id);
       $ebook->title = $request->title;
       $ebook->course_id = $request->course_id;
       //$ebook->subject_code = $request->subject_code;
       //$ebook->subject = $request->subject;
       $ebook->content = $request->content;
       $ebook->is_active= $request->is_active;

       if($file = $request->file('pdf_file')) {
            $name = implode('_',explode(' ',$request->title));
            $name = $name.'_'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/pdf');
            $file->move($destinationPath, $name);
            $ebook->pdf_file = $name;
        }
        if(!empty($oldSlag)) {
            $Newslug = $slug.'-'.rand(1000,10000);
            $slug = $Newslug;
        }
        $ebook->slug = strtolower($slug);
        $ebook->update();

        return redirect('/admin/pdf')->with('success', 'File has been updated');
    }

     /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show($id)
   {
       $show = FilePdf::findOrFail($id);
       return view('backend.pdf.show', compact('show'));
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = FilePdf::findOrFail($id);

        if (File::exists(public_path('pdf/' . $media->pdf_file))) {
            File::delete(public_path('pdf/' . $media->pdf_file));
        }
        $media->delete();

        return redirect('/admin/pdf')->with('success', 'File has been deleted');
    }

    protected function getRelatedSlugs($slug)
    {
        return FilePdf::select('slug')->where('slug', 'like', $slug.'%')
            ->first();
    }
}

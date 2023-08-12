<?php

namespace App\Http\Controllers;

use App\Wordbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WordbookController extends Controller
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
        $wordbooks = Wordbook::orderBy('id', 'desc')->where('is_destory', 0)->paginate(50);
        return view('backend.wordbook.index', compact('wordbooks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wordbook.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 
       
    if($request->ajax())
        {

            $arabic_word  = $request->arabic_word;
            $bengali_word = $request->bengali_word; 
            $english_word = $request->english_word; 
            $book_name    = $request->book_name; 
            $lesson_name  = $request->lesson_name; 

            for($count = 0; $count < count($arabic_word); $count++)
            {
                $data = array(
                    'arabic_word'  => $arabic_word[$count],
                    'bengali_word' => $bengali_word[$count],
                    'english_word' => $english_word[$count],
                    'book_name'    => $book_name[$count],
                    'lesson_name'  => $lesson_name[$count]
                );
                $insert_data[] = $data; 
            }

            Wordbook::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
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
        $edit = Wordbook::findOrFail($id);
        return view('backend.wordbook.edit', compact('edit'));
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
            'arabic_word' => 'required', 
            'bengali_word' => 'required', 
            'english_word' => 'required', 
             
        ]);  

       // dd($request->course_title);

        $media = Wordbook::findOrFail($id);  
        $media->arabic_word = $request->arabic_word;
        $media->bengali_word  = $request->bengali_word;
        $media->english_word  = $request->english_word;
        $media->book_name  = $request->book_name;
        $media->lesson_name  = $request->lesson_name;
        $media->update();    
        return redirect('/admin/wordbook')->with('success', 'word has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wordbook = Wordbook::findOrFail($id);
        $wordbook->delete();

        return redirect('/admin/wordbook')->with('success', 'word has been deleted');
    }
}

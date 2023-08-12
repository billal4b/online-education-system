<?php

namespace App\Http\Controllers;

use App\ArabicDictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArabicDictionaryController extends Controller
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
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        $keyword = $request->keyword ?? null;
        $data = ArabicDictionary::orderBy('id', 'desc')
            ->where(function ($query) use ($keyword) {
                if (!empty($keyword)) {
                    return $query->where('arabic_word', 'like', "%$keyword%")
                        ->orWhere('bengali_word', 'like', "%$keyword%")
                        ->orWhere('english_word', 'like', "%$keyword%")
                        ->orWhere('lesson_no', 'like', "%$keyword%")
                        ->orWhere('total_mentioned', 'like', "%$keyword%");
                }
            })
            //  ->toSql()
            ->paginate(50);
        //dd(DB::getQueryLog());
        //dd($data);
        return view('backend.arabic-dictionary.index', compact('data', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.arabic-dictionary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        if ($request->ajax()) {

            $arabic_word = $request->arabic_word;
            $bengali_word = $request->bengali_word;
            $english_word = $request->english_word;
            $lesson_no = $request->lesson_word;
            $total_used = $request->total_used;

            for ($count = 0; $count < count($arabic_word); $count++) {
                $data = array(
                    'arabic_word' => $arabic_word[$count],
                    'bengali_word' => $bengali_word[$count],
                    'english_word' => $english_word[$count],
                    'lesson_no' => $lesson_no[$count],
                    'total_mentioned' => $total_used[$count],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $insert_data[] = $data;
            }

            ArabicDictionary::insert($insert_data);
            return response()->json([
                'success' => 'Data Added successfully!'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = ArabicDictionary::findOrFail($id);
        return view('backend.arabic-dictionary.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'arabic_word' => 'required',
            'bengali_word' => 'required',
        ]);

        // dd($request->course_title);

        $media = ArabicDictionary::findOrFail($id);
        $media->arabic_word = $request->arabic_word;
        $media->bengali_word = $request->bengali_word;
        $media->english_word = $request->english_word;
        $media->lesson_no = $request->lesson_no;
        $media->total_mentioned = $request->total_mentioned;
        $media->updated_at = date("Y-m-d H:i:s");
//        'english_word' => $english_word[$count],
//            'lesson_no' => $lesson_no[$count],
//            'total_mentioned' => $total_used[$count],
//            'updated_at' => date("Y-m-d H:i:s")
        $media->update();
        return redirect('/admin/arabic-dictionary')->with('success', 'word has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wordbook = ArabicDictionary::findOrFail($id);
        $wordbook->delete();

        return redirect('/admin/arabic-dictionary')->with('success', 'word has been deleted!');
    }
}

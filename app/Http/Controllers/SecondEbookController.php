<?php

namespace App\Http\Controllers;

use App\SecondEbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SecondEbookController extends Controller
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
        //dd($request->all());
        $courseId = $request->course_name ?? null;
        $subjectId = $request->subject_type ?? null;
        $topicText = $request->topic_text ?? null;
        $topicKey = $request->topic ?? null;
        $dateRange = $request->daterange??null;
        $dateRangeArr = null;
        $startDate = null;
        $endDate = null;
        if (!empty($dateRange)) {
            $dateRangeArr = explode('to',$dateRange);
            $startDate = \date('Y-m-d', strtotime(trim($dateRangeArr[0]))) . ' 00:00:00';
            $endDate = \date('Y-m-d', strtotime(trim($dateRangeArr[1]))) . ' 23:59:59';
        }
        $data = SecondEbook::where(function ($query) use ($courseId) {
            if (!empty($courseId)) {
                return $query->where('course_id', '=', $courseId);
            }
        })
            ->where(function ($query) use ($subjectId) {
                if (!empty($subjectId)) {
                    return $query->where('subject_type', '=', $subjectId);
                }
            })
            ->where(function ($query) use ($startDate, $endDate) {
                if (!empty($startDate) && !empty($endDate)) {
                    return $query->whereBetween('publish_time', [$startDate, $endDate]);
                }
            })
            ->where(function ($query) use ($topicText) {
                if (!empty($topicText)) {
                    return $query->where('topic', 'like', "%$topicText%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(20);
        $data->appends(request()->query())->links();
        return view('backend.secondebook.index', compact('data','courseId','subjectId','topicKey',
            'dateRange','topicText','topicKey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.secondebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request);

        $rules = [
            'course_id' => 'required',
            'subject_type' => 'required',
            'topic' => 'required',
            'content_type' => 'required',
        ];
        if ($request->content_type == EBOOK_BOTH) {
            $rules['content'] = 'required';
            $rules['document'] = 'required';
        } elseif ($request->content_type == EBOOK_CONTENT) {
            $rules['content'] = 'required';
        } elseif ($request->content_type == EBOOK_DOCUMENT) {
            $rules['document'] = 'required';
        }
        $request->validate($rules);

        $ebook = new SecondEbook();
        if (isset($request->published)) {
            $ebook->published = EBOOK_PUBLISHED;
        } else {
            $ebook->published = EBOOK_UNPUBLISHED;
        }

        if ($request->publish_time != null) {
            $publishTime = $request->publish_time;
            $ePublishTime = (new \DateTime($publishTime))->format('Y-m-d H:i:s');
            $ebook->publish_time = $ePublishTime;
        }
        $ebook->course_id = $request->course_id;
        $ebook->subject_type = $request->subject_type;
        $ebook->topic = $request->topic;
        $ebook->content_type = $request->content_type;
        $ebook->content = $request->content;

        if ($file = $request->file('document')) {
            $name = implode('_', explode('/', $request->topic));
            $name = implode('_', explode(' ', $name));
            //$name = implode('_', explode(' ', $request->topic));
            $name = $name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/ebook');
            $file->move($destinationPath, $name);
            $ebook->document = $name;
        }
        $ebook->save();

        return redirect('/admin/ebook')->with('success', 'Saved Successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $edit = SecondEbook::findOrFail($id);
        //dd($edit);
        return view('backend.secondebook.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //dd($request);

        $rules = [
            'course_id' => 'required',
            'subject_type' => 'required',
            'topic' => 'required',
            //'content_type' => 'required',
        ];
        /*
        if($request->content_type == EBOOK_BOTH){
            $rules['content']='required';
            $rules['document']='required';
        }elseif($request->content_type == EBOOK_CONTENT){
            $rules['content']='required';
        }elseif($request->content_type == EBOOK_DOCUMENT){
            $rules['document']='required';
        }
        */
        $request->validate($rules);


        $ebook = SecondEbook::findOrFail($id);

        if (isset($request->published)) {
            $ebook->published = EBOOK_PUBLISHED;
        } else {
            $ebook->published = EBOOK_UNPUBLISHED;
        }
        if ($request->publish_time != null) {
            $publishTime = $request->publish_time;
            $ePublishTime = (new \DateTime($publishTime))->format('Y-m-d H:i:s');
            $ebook->publish_time = $ePublishTime;
        }
        $ebook->course_id = $request->course_id;
        $ebook->subject_type = $request->subject_type;
        $ebook->topic = $request->topic;
        $ebook->content_type = $request->content_type;
        $ebook->content = $request->content;

        if ($file = $request->file('document')) {
            $name = implode('_', explode('/', $request->topic));
            $name = implode('_', explode(' ', $name));
            $name = $name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/ebook');
            $file->move($destinationPath, $name);
            $ebook->document = $name;
        }

        $ebook->update();
        return redirect('/admin/ebook')->with('success', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SecondEbook::findOrFail($id);
        //dd($data);
        if (File::exists(public_path('ebook/' . $data->document))) {
            File::delete(public_path('ebook/' . $data->document));
        }
        $data->delete();
        return redirect()->back()->with('success', 'deleted Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $show = SecondEbook::findOrFail($id);

        return view('backend.secondebook.show', compact('show'));
    }

    protected function getRelatedSlugs($slug)
    {
        return SecondEbook::select('slug')->where('slug', 'like', $slug . '%')
            //->where('slug', 'like', '%'.$slug.'%')
            //->where('id', '<>', $id)
            ->first();
    }
}

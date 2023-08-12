<?php

namespace App\Http\Controllers\Frontend;

use App\ArabicDictionary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendArabicDictionaryController extends Controller
{
    public function dictionary(Request $request)
    {
        //dd($request->all());
        $isJson = isset($request->searchBy) ? $request->searchBy : null;
        //dd($isJson);
        $subject = !empty($request->subject) ? $request->subject : null;
        $search = !empty($request->search) ? $request->search : null;
        //dd('ok');
        $data = ArabicDictionary::orderBy('id', 'desc')
            ->where(function ($query) use ($subject) {
                if (!empty($subject)) {
                    return $query->where('lesson_no', 'like', "%$subject%");
                }
            })
            ->where(function ($query) use ($search) {
                if (!empty($search)) {
                    return $query->where('arabic_word', 'like', "%$search%")
                        ->orWhere('bengali_word', 'like', "%$search%")
                        ->orWhere('english_word', 'like', "%$search%")
                        ->orWhere('total_mentioned', 'like', "%$search%");
                }
            })
            ->where('is_active', 1)
            ->limit(40)
            ->get();
        //dd($data);
        //dd($isJson);
        if (!empty($isJson)) {
            $output = '';
            if (!empty($data)) {
                foreach ($data as $row) {
                    $output .= '
                        <tr>
                            <td>' . $row["bengali_word"] . '</td>
                            <td>' . $row["arabic_word"] . '</td>
                            <td>' . $row["english_word"] . '</td>
                            <td>' . $row["lesson_no"] . '</td>
                            <td class="text-center">' . $row["total_mentioned"] . '</td>
                        </tr>
                        ';
                }
            } else {
                $output = '
                    <tr>
                        <td class="text-center" colspan="5">No Data Found</td>
                    </tr>
                    ';
            }
            echo json_encode($output);
        } else {
            return view('frontend.pages.quranicDictionary', compact('data'));
        }
    }

    public function dictionarySubjectSearch(Request $request)
    {
        //dd($request->all());
        $searchKey = !empty($request->query('query')) ? $request->query('query') : null;
        //dd($searchKey);
        $data = ArabicDictionary::select('id','lesson_no as text')
            ->where(function ($query) use ($searchKey) {
                if (!empty($searchKey)) {
                    return $query->where('lesson_no', 'like', "%$searchKey%");
                }
            })
            ->whereNotNull('lesson_no')
            ->limit(100)
            ->groupBy('lesson_no')
            ->get()
            //->pluck('lesson_no')
            ->toArray()
        ;
        return ['results'=>$data];
        //dd($data);
        //return $data;
    }
}

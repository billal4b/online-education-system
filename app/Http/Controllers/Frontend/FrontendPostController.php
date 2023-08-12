<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\SecondEbook;
use Illuminate\Http\Request;
use App\Blog;
use App\Content;
use App\Result;
use App\Ebook;
use App\Wordbook;
use Illuminate\Support\Facades\Redirect;

class FrontendPostController extends Controller
{
    public function blog()
    {
        $blogs = Blog::select('id', 'title', 'excerpt', 'content', 'slug', 'date_time', 'image', 'is_active')
            ->where('is_active', 1)
            ->orderBy('date_time', 'desc')
            ->paginate(12);

        return view('frontend.pages.blog', compact('blogs'));
    }

    public function blogDetails($slug)
    {//dd($slug);
        $blogDetails = Blog::whereSlug($slug)->first();

        $recentPosts = Blog::select('id', 'title', 'slug', 'date_time', 'thumb', 'image', 'is_active')
            ->where('is_active', 1)
            ->orderBy('date_time', 'desc')
            ->limit(5)
            ->get();

        return view('frontend.pages.blog_details', compact('blogDetails', 'recentPosts'));
    }

    public function aboutUs()
    {
        $aboutUs = Content::where('is_active', 1)->where('section_name', 'About Us')->orderBy('order', 'desc')->get();

        return view('frontend.pages.about_us', compact('aboutUs'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contact_us');

    }

    public function wordbookk()
    {
        $data = Wordbook::orderBy('id', 'desc')
            ->where('is_destory', 0)
            ->paginate(25);
        return view('frontend.pages.wordbook', compact('data'));

    }
    public function wordbook(Request $request)
    {
        //dd($request->all());
        $isJson = isset($request->searchBy) ? $request->searchBy : null;
        //dd($isJson);
        $book_name = !empty($request->book_name) ? $request->book_name : null;
        $lesson_name = !empty($request->lesson_name) ? $request->lesson_name : null;
        $search = !empty($request->search) ? $request->search : null;
        //dd('ok');
        $data = Wordbook::orderBy('id', 'desc')
            ->where(function ($query) use ($book_name) {
                if (!empty($book_name)) {
                    return $query->where('book_name', '=', "$book_name");
                }
            })
            ->where(function ($query) use ($lesson_name) {
                if (!empty($lesson_name)) {
                    return $query->where('lesson_name', '=', "$lesson_name");
                }
            })
            ->where(function ($query) use ($search) {
                if (!empty($search)) {
                    return $query->where('bengali_word', 'like', "%$search%")
                        ->orWhere('arabic_word', 'like', "%$search%")
                        ->orWhere('english_word', 'like', "%$search%")
                        ;
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
                            <td>' . $row["book_name"] . '</td>
                            <td>' . $row["lesson_name"] . '</td>
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
            return view('frontend.pages.wordbook', compact('data'));
        }
    }

    public function dictionaryBookNameSearch(Request $request)
    {
        //dd($request->all());
        $searchKey = !empty($request->query('query')) ? $request->query('query') : null;
        //dd($searchKey);
        $data = Wordbook::select('id','book_name as text')
            ->where(function ($query) use ($searchKey) {
                if (!empty($searchKey)) {
                    return $query->where('book_name', 'like', "%$searchKey%");
                }
            })
            ->whereNotNull('book_name')
            ->limit(100)
            ->groupBy('book_name')
            ->get()
            //->pluck('lesson_no')
            ->toArray()
        ;
        return ['results'=>$data];
        //dd($data);
        //return $data;
    }
    public function dictionaryLessonNoSearch(Request $request)
    {
        //dd($request->all());
        $searchKey = !empty($request->query('search')) ? $request->query('search') : null;
        $bookName = !empty($request->query('book_name')) ? $request->query('book_name') : null;
        //dd($searchKey);
        $data = Wordbook::select('id','lesson_name as text')
            ->where(function ($query) use ($bookName) {
                if (!empty($bookName)) {
                    return $query->where('book_name', '=', "$bookName");
                }
            })
            ->where(function ($query) use ($searchKey) {
                if (!empty($searchKey)) {
                    return $query->where('lesson_name', 'like', "%$searchKey%");
                }
            })
            ->whereNotNull('lesson_name')
            ->limit(100)
            ->groupBy('lesson_name')
            ->get()
            //->pluck('lesson_no')
            ->toArray()
        ;
        return ['results'=>$data];
        //dd($data);
        //return $data;
    }


    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query != '') {
                $data = Wordbook::orderBy('id', 'desc')
                    ->where('is_destory', 0)
                    ->where('bengali_word', 'like', '%' . $query . '%')
                    ->orWhere('arabic_word', 'like', '%' . $query . '%')
                    ->orWhere('english_word', 'like', '%' . $query . '%')
                    ->orWhere('book_name', 'like', '%' . $query . '%')
                    ->orWhere('lesson_name', 'like', '%' . $query . '%')
                    ->paginate(25);
            } else {
                $data = Wordbook::orderBy('id', 'desc')
                    ->where('is_destory', 0)
                    ->paginate(25);
            }

            $total_row = $data->count();

            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                        <tr>
                            <td>' . $row["bengali_word"] . '</td>
                            <td>' . $row["arabic_word"] . '</td>
                            <td>' . $row["english_word"] . '</td>
                            <td>' . $row["book_name"] . '</td>
                            <td>' . $row["lesson_name"] . '</td>
                        </tr>
                        ';
                }
            } else {
                $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                    ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );
            echo json_encode($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result()
    {
        $data = Result::orderBy('id', 'desc')
            ->where('is_destroy', 1)
            ->paginate(20);
        return view('frontend.pages.result', compact('data'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ebook_back()
    {
        // $lastEbook = Ebook::where('is_active', 1)
        //    ->where('is_destroy', 1)
        //    ->where('is_active', 1)
        //    ->latest()
        //    ->first();

        $data = Ebook::orderBy('id', 'desc')
            ->where('is_destroy', 1)
            ->where('is_active', 1)
            ->paginate(21);

        return view('frontend.pages.ebook', compact('data'));
    }

    public function ebook()
    {
        $data = [];
        return view('frontend.pages.ebook', compact('data'));

    }

    public function ebookTopicSearch(Request $request)
    {
        $data = [];
        if (!empty($request->term)) {
            $searchKey = $request->term;
            $data['results'] = SecondEbook::select(['id', 'topic as text'])
                ->where('topic', 'like', "%$searchKey%")
                ->groupBy('topic')
                ->limit(10)
                ->get()
                ->toArray();
        }
        return $data;
    }

    public function findEbook(Request $request)
    {
        $courseId = $request->course_id;
        $subjectId = $request->subject_id;
        $ebooks = SecondEbook::where('course_id', '=', $courseId)
            ->where('subject_type', '=', $subjectId)
            ->where('published', '=', EBOOK_PUBLISHED)
            ->orderByDesc('publish_time')
            ->limit(150)
            ->get()
            ->toArray();
        $view = view('frontend.pages.ebookFilter', compact('ebooks', 'courseId', 'subjectId'))->render();
        return response()->json(array('success' => true, 'html' => $view));
    }

    public function getSingleBookDetail(Request $request)
    {
        $ebookId = $request->ebook_id;
        $ebook = SecondEbook::findorFail($ebookId)->toArray();
        $view = view('frontend.pages.ebookFilterContent', compact('ebook'))->render();
        return response()->json(array('success' => true, 'html' => $view, 'topic' => $ebook['topic']));
    }

    public function getDateRangeWiseBookList(Request $request)
    {
        $courseId = $request->course_id;
        $subjectId = $request->subject_id;
        $topicKey = $request->search_key;
        if (!empty($request->date_range)){
            $dateRange = explode('to', $request->date_range);
            $startDate = \date('Y-m-d', strtotime(trim($dateRange[0]))) . ' 00:00:00';
            $endDate = \date('Y-m-d', strtotime(trim($dateRange[1]))) . ' 23:59:59';
        }else{
            $startDate = null;
            $endDate = null;
        }

//        dd(strtotime(trim($dateRange[0])));
//        dd($dateRange[0]);
//        dd($startDate);
        //dd($endDate);
        $ebooks = SecondEbook::where('course_id', '=', $courseId)
            ->where('subject_type', '=', $subjectId)
            ->where('published', '=', EBOOK_PUBLISHED)
            ->where(function ($query) use ($startDate, $endDate) {
                if (!empty($startDate) && !empty($endDate)) {
                    return $query->whereBetween('publish_time', [$startDate, $endDate]);
                }
            })
            ->where(function ($query) use ($topicKey) {
                if (!empty($topicKey)) {
                    return $query->where('topic', 'like', "%$topicKey%");
                }
            })
            ->orderByDesc('publish_time')
            ->limit(150)
            ->get()
            ->toArray();
        $view = view('frontend.pages.ebookListDateRange', compact('ebooks', 'courseId', 'subjectId'))->render();
        return response()->json(array('success' => true, 'html' => $view));
    }

    public function ebookDetails($slug)
    {
        $ebookDetails = Ebook::whereSlug($slug)->first();

        $data = Ebook::orderBy('id', 'desc')
            ->where('is_active', 1)
            ->where('is_destroy', 1)
            ->paginate(30);

        return view('frontend.pages.ebook_details', compact('ebookDetails', 'data'));
    }

    public function ebookSearch(Request $request)
    {
        $search = $request->input('section');
        if ($search == "0") {
            return Redirect::route('ebook');
        }
        $ebookSearch = Ebook::query()
            ->where('section', 'LIKE', "%{$search}%")
            ->where('is_destroy', 1)
            ->where('is_active', 1)
            ->paginate(45);

        return view('frontend.pages.ebook_search', compact('ebookSearch'));
    }

}

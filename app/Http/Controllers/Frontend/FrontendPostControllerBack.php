<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Blog;
Use App\Content;
Use App\Result;
Use App\Ebook;
use App\Wordbook;
use Illuminate\Support\Facades\Redirect;

class FrontendPostController extends Controller
{
    public function blog()
    {
        $blogs = Blog::select('id','title','excerpt','content','slug','date_time','image','is_active')
                ->where('is_active',1)
                ->orderBy('date_time', 'desc')
                ->paginate(12);

        return view('frontend.pages.blog',compact('blogs'));
    }

    public function blogDetails($slug)
    {//dd($slug);
        $blogDetails = Blog::whereSlug($slug)->first();
        
        $recentPosts = Blog::select('id','title','slug','date_time','thumb','image','is_active')
            ->where('is_active',1)
            ->orderBy('date_time', 'desc')
            ->limit(5)
            ->get();

        return view('frontend.pages.blog_details',compact('blogDetails','recentPosts'));
    }

    public function aboutUs()
    {
        $aboutUs = Content::where('is_active',1)->where('section_name', 'About Us')->orderBy('order', 'desc')->get();

        return view('frontend.pages.about_us',compact('aboutUs'));
    }

     public function contactUs()
    {
        return view('frontend.pages.contact_us');

    }

  public function wordbook()
    {
        $data = Wordbook::orderBy('id', 'desc')
            ->where('is_destory', 0)
            ->paginate(25);
        return view('frontend.pages.wordbook', compact('data'));

    }



    public function action(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $query = $request->get('query');

                if($query != '') {
                    $data = Wordbook::orderBy('id', 'desc')
                    ->where('is_destory', 0)
                    ->where('bengali_word', 'like', '%'.$query.'%')
                    ->orWhere('arabic_word', 'like', '%'.$query.'%')
                    ->orWhere('english_word', 'like', '%'.$query.'%')
                    ->orWhere('book_name', 'like', '%'.$query.'%')
                    ->orWhere('lesson_name', 'like', '%'.$query.'%')
                    ->paginate(25);
                } else {
                    $data = Wordbook::orderBy('id', 'desc')
                        ->where('is_destory', 0)
                        ->paginate(25);
                }

                $total_row = $data->count();

                if($total_row > 0) {
                    foreach($data as $row) {
                        $output .= '
                        <tr>
                            <td>'.$row["bengali_word"].'</td>
                            <td>'.$row["arabic_word"].'</td>
                            <td>'.$row["english_word"].'</td>
                            <td>'.$row["book_name"].'</td>
                            <td>'.$row["lesson_name"].'</td>
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
                    'table_data'  => $output,
                    'total_data'  => $total_row
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
    public function ebook()
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

    public function ebookDetails($slug)
    {
        $ebookDetails = Ebook::whereSlug($slug)->first();

        $data = Ebook::orderBy('id', 'desc')
                 ->where('is_active', 1)
                 ->where('is_destroy', 1)
                 ->paginate(30);

        return view('frontend.pages.ebook_details',compact('ebookDetails','data'));
    }

    public function ebookSearch(Request $request){
        $search = $request->input('section');
        if($search == "0") {
            return Redirect::route('ebook');
        }
        $ebookSearch = Ebook::query()
            ->where('section', 'LIKE', "%{$search}%")
            ->where('is_destroy', 1)
            ->where('is_active', 1)
            ->paginate(45);

        return view('frontend.pages.ebook_search',compact('ebookSearch'));
    }

}

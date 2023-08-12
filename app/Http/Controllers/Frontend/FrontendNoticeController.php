<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;

class FrontendNoticeController extends Controller
{
    public function notice()
    {
        $notices = Notice::where('is_active',1)->where('is_destroy',0)->orderBy('publish_at', 'desc')->paginate(7);    
        $lastnotice = Notice::where('is_active', 1)->where('is_destroy', 0)->latest('publish_at', 'desc')->first();   
        
       // dd($lastnotice);

        return view('frontend.pages.notice',compact('notices', 'lastnotice'));
       // return view('frontend.pages.notice');
    }

    public function noticeDetails($slug) 
    {
        $noticeDetails = Notice::whereSlug($slug)->first();
        $notices = Notice::where('is_active', 1)->where('is_destroy', 0)->orderBy('publish_at', 'desc')->paginate(7);

        return view('frontend.pages.notice_details',compact('noticeDetails','notices'));
    }
}

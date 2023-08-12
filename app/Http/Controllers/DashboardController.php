<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Notice;

class DashboardController extends Controller
{
    public function index()
    { 
        $totalUser = User::count();
        $activeUser = User::where('status','=', 'active')->count();
        $totalBlog = Blog::count();
        $totalNotice = Notice::count();
        //dd($activeUser);
        return view('backend.layouts.dashboard', compact('totalUser','activeUser','totalBlog','totalNotice'));   
      
    }

    
}

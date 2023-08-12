<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoController;
use App\Photo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/dashboard';

    public function showLoginForm()
    {
        $loginBanner = Photo::select('image_thumb','image_name')
        ->where('image_type', '=', 'loginImage')
            ->where('is_active',1)
            ->orderByDesc('id')
            ->first();
        //dd($loginBanner);
        return view('auth.login')->with('loginBanner',$loginBanner);
    }

    public function redirectTo()
    {

        $user = Auth::user()->is_admin;
        // Check user
        switch ($user) {
            case 1:
                return '/admin/dashboard';
                break;
            case 0:
                return '/dashboard/';
            default:
                return '/registration';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
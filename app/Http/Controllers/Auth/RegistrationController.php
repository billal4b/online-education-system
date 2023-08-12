<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
       // $courses = Course::orderBy('order', 'desc')->where('is_active', 1)->where('category', 1)->get();
        $courses = Course::orderBy('order', 'desc')->where('is_active', 1)->where('category', 1)->pluck('course_name','id')->all();
        return view('auth.registration', compact('courses'));
        //return view('auth.registration');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function registerCreate(Request $request)
    { //dd($request);
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            //'course_title' => ['required'],
            'select_course' => ['required'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'   => ['required'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $create = [
            'name'    => $request->name,
            'select_course' => $request->select_course,
            'gender'  => $request->gender,
            'email'   => $request->email,
            'mobile'  => $request->mobile,
            //'password' => Hash::make($request->password),
            'address' => $request->address
        ];

        user::create($create);
        return back()->with('success','Successfully applied. You will be contacted!');
    }

}

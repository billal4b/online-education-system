<?php

namespace App\Http\Controllers\Userend;

use App\User;
use App\Course;
use App\PaymentInfo;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use App\TodayClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserEndDashboardController extends Controller
{
    /**
     * Display the specified Dashboard.
    **/
    public function dashboardUser()
    {
       // $todayClass = TodayClass::where()
        return view('userend.layouts.dashboard');
    }

    /**
     * Display the specified Password.
    **/
    public function passwordUser()
    {
        return view('userend.users.user_password');
    }

    public function passwordUserUpdate(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:6'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
        return redirect('/change-password')->with('success', 'Password change successfully.');
    }

    /**
     * Display the specified Profile Picture update.
    **/
    public function profileUser()
    {
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();  
        return view('userend.users.user_profile', compact('courses'));
    }

    public function profilePictureUser(Request $request, $id){
        
        $request->validate([            
            //'image' => 'image|mimes:jpeg,png,jpg,gif',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
         ]);

        $adminPicture = User::findOrFail($id);
        if( $file = $request->file('image')) {
            $imgname = implode('-',explode(' ',$request->name)); 
             $imgname = $imgname.'_'.time().'.'.$file->getClientOriginalExtension();
             $destinationPath = public_path('/images/profile');
             $img = Image::make($file->path());
             $img->resize(150, 150, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$imgname); 
             $adminPicture->image = $imgname;
         }
         $adminPicture->update();
         return back()->with('success','Successfully Updated!');
    }
    
    /**
     * Display the specified Profile Edit.
    **/
    public function profileEditUser($id)
    {
        $edit = User::findOrFail($id);      
        return view('userend.users.user_edit', compact('edit'));
    }

    public function profileUpdateUser(Request $request, $id)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'mobile'   => ['required'],
        ]);

        $user = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->blood_group  = $request->blood_group;
        $user->address  = $request->address;
        $user->gender  = $request->gender;
        $user->dob  = $request->dob;
        $user->nid_no  = $request->nid_no;
        $user->update();
        return redirect('/user-profile')->with('success', 'Your Profile updated');
    }

    /**
     * Display the specified Payment.
    **/
    public function paymentUser(Request $request)
    {
        $userID = Auth::user()->user_id;  
        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();                
        $data   = PaymentInfo::where('user_id', $userID)->get();
        
        return view('userend.users.user_payment', compact('data', 'courses'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Rules\MatchOldPassword;
use App\Student;
use App\Mail\SendUserData;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //protected $notifications;

    public function __construct()
    {
        $this->middleware('adminmiddleware');
        //$notifications = DB::table('users')->count();
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {

        $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                //->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        //dd($courses);
        $genderId = $request->gender ?? null;
        $courseId = $request->select_course ?? null;
        $nameText = $request->name_text ?? null;
        $nameKey = $request->name ?? null;
        $dateRange = $request->daterange??null;
        $dateRangeArr = null;
        $startDate = null;
        $endDate = null;

       // dd($genderId);
        if (!empty($dateRange)) {
            $dateRangeArr = explode('to',$dateRange);
            $startDate = \date('Y-m-d', strtotime(trim($dateRangeArr[0]))) . ' 00:00:00';
            $endDate = \date('Y-m-d', strtotime(trim($dateRangeArr[1]))) . ' 23:59:59';
        }
        $data = User::where(function ($query) use ($courseId) {
            if (!empty($courseId)) {
                // return $query->where('select_course', '=', $courseId);
                return $query->whereRaw("find_in_set($courseId, select_course)");
            }
        })
            ->where(function ($query) use ($genderId) {
                if (!empty($genderId)) {
                    return $query->where('gender', '=', $genderId);
                }
            })
            ->where(function ($query) use ($startDate, $endDate) {
                if (!empty($startDate) && !empty($endDate)) {
                    return $query->whereBetween('updated_at', [$startDate, $endDate]);
                }
            })
            ->where(function ($query) use ($nameText) {
                if (!empty($nameText)) {
                    return $query->where('name', 'like', "%$nameText%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(25);

            $data->appends(request()->query())->links();
            //dd($data->toArray());
            return view('backend.users.index', compact('courses','data','courseId','genderId','dateRange','nameText','nameKey'));
    }

    public function userNameSearch(Request $request)
    {
        $data = [];
        if (!empty($request->term)) {
            $searchKey = $request->term;
            $data['results'] = User::select(['id', 'name as text'])
                ->where('name', 'like', "%$searchKey%")
                ->groupBy('name')
                ->limit(10)
                ->get()
                ->toArray();
        }
        return $data;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $edit = User::findOrFail($id);
       $courses = Course::orderBy('order', 'desc')
                ->where('is_active', 1)
                //->where('category', 1)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        return view('backend.users.edit', compact('edit','courses'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'mobile'   => ['required'],
           // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::findOrFail($id);
        $user->user_id  = 'IQS'.$request->id;
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->select_course = $request->select_course;
        $user->blood_group  = $request->blood_group;
        $user->address  = $request->address;
        $user->gender  = $request->gender;
        $user->dob  = $request->dob;
        $user->nid_no  = $request->nid_no;
        $user->status  = $request->status;
        $user->is_kids  = $request->is_kids;
        $user->update();
        
        $studenId = $user->user_id;
        $studenEmail = $user->email;
        $studenPassword = $request->password;
        
        //send notification email to the user, if enabled
        if($request->status == 'active') {
            $send_email = array(
                'title'     => 'Mail from iqsbd.com',
                'user_id'   => trim($studenId),
                'name'      => trim($request['name']),
                'email'     => trim(strtolower($request['email'])),
                'password'  => $request['password'],
            );
            if(!empty($send_email)){
                //print_r($send_email['email']); exit;
                $mail = $send_email['email'];
                Mail::to($mail)->send(new SendUserData ($send_email));
            }
        }

        return redirect('/admin/user')->with('success', 'User Info updated. (Student ID: '.$studenId.', Email: '.$studenEmail.', Password: '.$studenPassword.')');
    }

    public function countUser(){
        $users = User::count();
        return view('backend.layouts.dashboard', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $student = Student::where('id', '=', $user->student_id)->first();
        if (!empty($student)){
            $student->delete();
        }
        $user -> delete();
        return redirect('/admin/user')->with('success', 'User has been deleted');
    }


     //----------- Admission Form for kids ---------------//

    public function admittedUser()
    {
        $courses = Course::where('is_active', 1)
                ->where('category', 0)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        $admittedUsers = Student::orderBy('id', 'desc')->paginate(20);
               // ->where('status', 'active')
                
        return view('backend.users.admitted_user', compact('admittedUsers', 'courses'));

    }


    public function admittedUserShow($id)
    {
       $courses = Course::where('is_active', 1)
                ->where('category', 0)
                ->where('is_destroy', 1)
                ->pluck('course_name','id')
                ->all();
        $show = Student::findOrFail($id);
        return view('backend.users.admitted_user_show', compact('show', 'courses'));
    }


    public function admittedUserDestroy($id)
    {
        $student = Student::findOrFail($id);
        $users = User::where('student_id', '=', $student->id)->first();
        if (!empty($users)){
            $users->delete();
        }
        $student->delete();
        return redirect()->back()->with('success', 'deleted Successfully!');
        
        // if ($student->status == 'active') {
        //     $student->status = 'inactive';
        // }
        // $student->save();
    }

    /**
    * Upadate password
    */
    public function changePassword()
    {
        return view('backend.users.change_password');
    }

    /**
     * Show the application password.
     */
    public function upadatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:6'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        //dd('Password change successfully.');
        return redirect('/admin/change-password')->with('success', 'Password change successfully.');

    }
    
    /**
     * Admin Profile Show
     */
    public function adminProfile(){
        $data = auth()->user(); 
        return view('backend.users.profile', compact('data'));
    }
    /**
     * Admin Profile Picture
     */
    public function adminProfilePicture(Request $request, $id){
        
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
}

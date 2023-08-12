<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use App\Student;
Use App\Course;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
    /**
     * Show the application admission form.
     *
     * @return \Illuminate\Http\Response
     */
    public function admissionForm()
    {

        //$admissionForm = Course::orderBy('order', 'desc')->where('is_active', 1)->where('category', 0)->get();
        
        $admissionForm = Course::orderBy('order', 'desc')
            ->where('is_active', 1)
            ->where('category',0)
            ->where('is_destroy', 1)
            ->pluck('course_name','id')
            ->all();
        return view('frontend.pages.admission_form', compact('admissionForm'));
    }

    /**
     * Handle a admission request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function admissionCreate(Request $request)
    {
        $request->validate([
           'student_name'  => 'required',
            'edu_qua'       => 'required',
            'institute_name'=> 'required',
            'select_course'   => 'required',
            'email'    =>  ['required', 'string', 'email', 'max:255', 'unique:students'],
            'contact'       => 'required',
            'student_image' => 'image|mimes:jpeg,png,jpg,gif',
              //'student_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              // 'father_name'   => 'required',
           // 'mother_name'   => 'required',
             // 'relation'      => 'required',
           // 'date_time'     => 'required',
            'email'    =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        
        //$users = User::where('email', '=', $request->input('email'))->first();
        
       // if ($users == null) {
    
                $admission = new Student();
                $admission->student_name = $request->student_name;
                $admission->edu_qua = $request->edu_qua;
                $admission->institute_name = $request->institute_name;
                $admission->nid = $request->nid;
                $admission->dob = $request->dob;
                $admission->gender = $request->gender;
                $admission->select_course = $request->select_course;
                $admission->father_name = $request->father_name;
                $admission->mother_name = $request->mother_name;
                $admission->guardian_name = $request->guardian_name;
                $admission->address = $request->address;
                $admission->relation = $request->relation;
                $admission->email = $request->email;
                $admission->contact = $request->contact;
                $admission->contact_father = $request->contact_father;
                $admission->contact_mother = $request->contact_mother;
                $admission->date_time = $request->date_time;
                
                if( $file = $request->file('student_image')) {
                   // $slug = implode('-',explode(' ',$request->title));
                    $imgname = time().'.'.$file->getClientOriginalExtension();
                    $destinationPath = public_path('/images/admission/thumb');
                    $img = Image::make($file->path());
                    $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$imgname);
        
                    $destinationPath = public_path('/images/admission/');
                    $file->move($destinationPath, $imgname);
                    
                    $admission->student_image = $imgname;
                }
                
                $admission->save();
                
                /* Send data user table*/
                $studenId = $admission->id;
                $create = [
                    'name'    => $request->student_name,
                    'select_course' => $request->select_course,
                    'gender'  => $request->gender,
                    'email'   => $request->email,
                    'mobile'  => $request->contact,
                    'dob'  => $request->dob,
                    'nid_no'  => $request->nid,
                    'student_id' => $studenId,
                    'address' => $request->address,
                    'is_kids' => 1
                ];
                User::create($create);
            
       // } else {
        //  return back()->with('error','Email already in use!');
        //}
        
        return back()->with('success','Successfully applied. You will be contacted!');
    }
    
}

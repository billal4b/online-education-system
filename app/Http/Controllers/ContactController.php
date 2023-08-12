<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Contact;

class ContactController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs = Contact::orderBy('id', 'desc')->get();
        return view('backend.contact_us.index', compact('contactUs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 
        $storeData = [
            'name'      => $request->name,
            'mobile_no' => $request->mobile_no,             
            'message'   => $request->message                        
        ];
        $contactMessage = Contact::create($storeData);
        return redirect('/contact-us')->with('success', 'Successfully submitted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/admin/contact')->with('success', 'Messenger information has been deleted');
    }
}

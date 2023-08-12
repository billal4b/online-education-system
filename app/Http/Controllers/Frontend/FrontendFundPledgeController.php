<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FundPledge;

class FrontendFundPledgeController extends Controller
{
    public function index()
    {
        // $fundPledge = FundPledge::orderBy('order', 'desc')
        //         ->where('is_active', 1)
        //         ->where('is_destroy', 1)
        //         ->get();
        return view('frontend.pages.fundPledge');

    }

    public function store(Request $request) {
       // dd($request);
        $request->validate([
            'name'  => 'required',
            'address'  => 'required',
            'contact' => 'required',
            'ref_name' => 'required',
            'ref_contact' => 'required',
            'fund_amount' => 'required',
            'pledge_clause' => 'required',
            //'pledge_time' => 'required',
        ]);

        $FundPledge = new FundPledge();
        $FundPledge->name = $request->name;
        $FundPledge->address = $request->address;
        $FundPledge->city = $request->city;
        $FundPledge->post_code = $request->post_code;
        $FundPledge->contact = $request->contact;
        $FundPledge->email = $request->email;
        $FundPledge->ref_name = $request->ref_name;
        $FundPledge->relationship = $request->relationship;
        $FundPledge->ref_contact = $request->ref_contact;
        $FundPledge->ref_email = $request->ref_email;
        $FundPledge->fund_amount = $request->fund_amount;
        $FundPledge->pledge_clause = $request->pledge_clause;
        //$FundPledge->pledge_time = $request->pledge_time;
        if($request->pledge_time_input != null){
            $FundPledge->pledge_time = $request->pledge_time_input;
        } else {
            $FundPledge->pledge_time = $request->pledge_time;
        }
        $FundPledge->issue_date = $request->issue_date;
        $FundPledge->save();
        return back()->with('success','Fund Pledge Info Send Successfully!');

    }

}

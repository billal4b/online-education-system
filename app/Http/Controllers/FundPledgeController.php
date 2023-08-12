<?php

namespace App\Http\Controllers;

use App\FundPledge;
use Illuminate\Http\Request;

class FundPledgeController extends Controller
{
    public function index()
    {
        $FundPledge = FundPledge::orderBy('id', 'desc')
                    ->where('is_destroy', 1)
                    ->paginate(20);
        //dd($FundPledge);
        return view('backend.pledge.index', compact('FundPledge'));

    }

    public function show($id)
    {
        $show = FundPledge::findOrFail($id);
        return view('backend.pledge.show', compact('show'));
    }

    public function destroy($id)
    {
        $donor = FundPledge::findOrFail($id);

        if ($donor->is_destroy == 1) {
            $donor->is_destroy = 0;
        }
        $donor->save();
        return redirect()->back()->with('success', 'deleted Successfully!');
    }

 public function edit($id)
    {
        $edit = FundPledge::findOrFail($id);
        return view('backend.pledge.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'  => 'required',
            'address'  => 'required',
            'contact' => 'required',
            'ref_name' => 'required',
            'ref_contact' => 'required',
            'fund_amount' => 'required',
            'pledge_clause' => 'required',
        ]);

        $FundPledge = FundPledge::findOrFail($id);
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
        $FundPledge->pledge_time = $request->pledge_time;
        // if($request->pledge_time_input != null){
        //     $FundPledge->pledge_time = $request->pledge_time_input;
        // } else {
        //     $FundPledge->pledge_time = $request->pledge_time;
        // }
        $FundPledge->issue_date = $request->issue_date;
        $FundPledge->update();
         return redirect('/admin/pledge-user')->with('success','Successfully Updated!');
    }
}


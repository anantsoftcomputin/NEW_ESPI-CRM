<?php

namespace App\Http\Controllers;

use App\Models\TransactionCredit;
use Illuminate\Http\Request;

class TransactionCreditController extends Controller
{
    public function add(Request $request,$enquiryId)
    {

        $request->validate([
            // 'name'=>'required',
            // 'price'=>'required|numeric',
            // 'card_number'=>'required|numeric',
            // 'note'=>'required',
            // 'payment_status'=>'required',
            // 'payment_title'=>'required'
        ]);

        $transaction=new TransactionCredit();
        $transaction->name=$request->name;
        $transaction->price=$request->price;
        $transaction->card_number=$request->card_number;
        $transaction->payment_title=$request->payment_title;
        $transaction->payment_status=$request->payment_status;
        $transaction->note=$request->note;
        $transaction->enquiry_id=$enquiryId;
        $transaction->company_id=\Auth::user()->company_id;
        $transaction->receive_by=\Auth::user()->id;
        $transaction->save();
        return redirect()->back()->withInfo('Add  Credit Card Transaction SuccessFully.');

    }

    public function get(){

        $data= TransactionCredit::all();

        return view('enquiry.index', compact('data'));
    }
}

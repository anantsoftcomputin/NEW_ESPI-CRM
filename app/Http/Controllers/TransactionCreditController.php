<?php

namespace App\Http\Controllers;

use App\Models\TransactionCredit;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionCredit\EditTransactionCredit;

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

    public function edit(TransactionCredit $TransactionCredit)
    {
        $title = "User Details";
        $roles = Role::pluck('name', 'id');
        return view('TransactionCredit.edit', compact('TransactionCredit','title', 'roles'));
    }
    public function update(EditTransactionCredit $request, TransactionCredit $TransactionCredit)
    {

        $TransactionCredit->name=$request->name;
        $TransactionCredit->price=$request->price;
        $TransactionCredit->card_number=$request->card_number;
        $TransactionCredit->payment_title=$request->payment_title;
        $TransactionCredit->payment_status=$request->payment_status;
        $TransactionCredit->note=$request->note;
        $TransactionCredit->enquiry_id=$enquiryId;
        $TransactionCredit->company_id=\Auth::user()->company_id;
        $TransactionCredit->receive_by=\Auth::user()->id;
        $TransactionCredit->save();


        return redirect()->back()->withInfo('Update  Credit Card Transaction SuccessFully.');
    }
  
}

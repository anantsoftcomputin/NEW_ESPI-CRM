<?php

namespace App\Http\Controllers;
use App\Models\university;
use App\Models\Enquiry;
use App\Models\Transaction;
use DB;
use Illuminate\Http\Request;
use App\Models\course;

class TransactionController extends Controller
{
    public function add(Request $request,$enquiryId)
    {
        $request->validate([
            'payment_mode'=>'required',
            'price'=>'required|numeric',
            'note'=>'required',
            'title'=>'required'
        ]);
        $transaction=new Transaction();
        $transaction->package_name=$request->package_name;
        $transaction->package_price=$request->package_price;
        $transaction->price=$request->price;
        $transaction->title=$request->title;
        $transaction->payment_mode=$request->payment_mode;
        $transaction->bank_name=$request->bank_name;
        $transaction->check_number=$request->check_number;
        $transaction->check_date=$request->check_date;
        $transaction->note=$request->note;
        $transaction->enquiry_id=$enquiryId;
        $transaction->company_id=\Auth::user()->company_id;
        $transaction->receive_by=\Auth::user()->id;
        $transaction->save();
        return redirect()->back()->withInfo('Add Transaction SuccessFully.');
    }
    public function receipt($id)
    {
        $transaction = Transaction::join('enquiries', 'transactions.enquiry_id', '=', 'enquiries.id')
                            ->select(['transactions.*', 'enquiries.*'])
                            ->where('transactions.id',$id)
                            ->latest('transactions.id')
                            ->first();

        // $transaction = Transaction::with('Enquiry')->get();
        //dd($transaction);
                       // print_r($transaction);die;
         return view('enquiry/receipt',compact('transaction'));

        // $transaction = Transaction::find($id);
        // $university=University::all();
        // $course=Course::all();
        // $enquiry=Enquiry::all();
        // return view('enquiry/receipt',compact('transaction','university','course','enquiry'));
    }
    // public function edit($enquiri)
    // {
    //     $user=User::role('Counsellor')->get();
    //     $university=University::all();
    //     $course=Course::all();
    //     $intake=Intact::all();
    //     $page="Enquiry";
    //     $title="Update Enquiry";
    //     $enquiry=Enquiry::find($enquiri);
    //     return view('enquiry.edit',compact('user','university','course','intake','page','title','enquiry'));
    // }

}

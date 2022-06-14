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
            'price'=>'required|numeric',
        ]);
        $transaction=new Transaction();
        $transaction->package_name=$request->package_name;
        $transaction->package_price=$request->package_price;
        $transaction->price=$request->price;
          $transaction->pending_price=$request->pending_price;
        $transaction->title=$request->title;
        // $transaction->payment_mode=$request->payment_mode;
        $transaction->bank_name=$request->bank_name;
        $transaction->check_number=$request->check_number;
        $transaction->check_date=$request->check_date;
        $transaction->check_amount=$request->check_amount;
        $transaction->upi_type=$request->upi_type;
        $transaction->upi_id=$request->upi_id;
           $transaction->upi_amount=$request->upi_amount;
        $transaction->cash_mode=$request->cash_mode;
           $transaction->cash_amount=$request->cash_amount;
         $transaction->cash_date=$request->cash_date;
        $transaction->note=$request->note;
        $transaction->enquiry_id=$enquiryId;
        $transaction->company_id=\Auth::user()->company_id;
        $transaction->receive_by=\Auth::user()->id;
        $transaction->save();

        // print_r($transaction);die;
        return redirect()->back()->withInfo('Add Transaction SuccessFully.');
    }
    public function receipt($id)
    {
        $transaction = Transaction::join('enquiries', 'transactions.enquiry_id', '=', 'enquiries.id')
                            ->select(['transactions.*', 'enquiries.*'])
                            ->where('transactions.id',$id)
                            ->latest('transactions.id')
                            ->first();
        $latestid  =Transaction::select('*')->where('transactions.id',$id)->first();
        // $transaction = Transaction::with('Enquiry')->get();
        //dd($transaction);
                       // print_r($transaction);die;
         return view('enquiry/receipt',compact('transaction','latestid'));

    }
    

}

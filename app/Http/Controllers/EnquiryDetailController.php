<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Activity;
use App\Models\EnquiryDetail;
use Illuminate\Http\Request;

class EnquiryDetailController extends Controller
{
    public function add($id,$step=1)
    {
        $enquiry=Enquiry::find($id);
        return view('enquiry.detail',compact('id','enquiry','step'));
    }

    public function store($id,Request $request)
    {
        $Activity=Activity::create(['string'=>"Add Enquires Detail",'enquiry_id'=>$id]);
        $EnquiryDetail=new EnquiryDetail();
        $EnquiryDetail->enquiry_id=$id;
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }

    public function Show($id)
    {
        $enquirydetail=EnquiryDetail::find($id);
        $enquiry=Enquiry::find($enquirydetail->enquiry_id);
        $last=json_decode($enquirydetail->data);
        return view('enquiry.editdetail',compact('id','enquiry','enquirydetail','last'));
    }

    public function Update($id,Request $request)
    {
        $EnquiryDetail=EnquiryDetail::find($id);
        $Activity=Activity::create(['string'=>"Update Enquires Detail",'enquiry_id'=>$EnquiryDetail->enquiry_id]);
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }

    public function detail($id)
    {
        $enquiry=Enquiry::with('Details','Application','Assessment')->where('id',$id)->first();
        $enquiry->Details->data=json_decode($enquiry->Details->data);
        // dd($enquiry);
        return view('enquiry.detail_ui.index',compact('enquiry'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryDetail;
use Illuminate\Http\Request;

class EnquiryDetailController extends Controller
{
    public function add($id)
    {
        $enquiry=Enquiry::find($id);
        return view('enquiry.detail',compact('id','enquiry'));
    }

    public function store($id,Request $request)
    {
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
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
        // $enquirydetail=EnquiryDetail::find($id);
        // $enquiry=Enquiry::find($enquirydetail->enquiry_id);
        // $last=json_decode($EnquiryDetail->data);
        // return view('enquiry.detail',compact('id','enquiry','enquirydetail','last'));
    }

    public function detail($id)
    {
        return view('enquiry.detail_ui.index');
    }
}

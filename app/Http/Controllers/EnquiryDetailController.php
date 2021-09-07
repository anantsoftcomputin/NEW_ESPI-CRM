<?php

namespace App\Http\Controllers;

use App\Models\EnquiryDetail;
use Illuminate\Http\Request;

class EnquiryDetailController extends Controller
{
    public function add($id)
    {
        return view('enquiry.detail',compact('id'));
    }

    public function store($id,Request $request)
    {
        $EnquiryDetail=new EnquiryDetail();
        $EnquiryDetail->enquiry_id =$id;
        // $data = $request->only('marital_status','passport','country_intrusted','reference_name','reference_phone','last_education');
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }
}

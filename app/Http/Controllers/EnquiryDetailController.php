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
        $EnquiryDetail->enquiry_id =$id;
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }
}

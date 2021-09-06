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
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }
}

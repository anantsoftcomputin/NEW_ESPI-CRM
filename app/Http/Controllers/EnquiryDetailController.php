<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryDetail;
use App\Models\Document;
use Illuminate\Http\Request;

class EnquiryDetailController extends Controller
{
    public function add($id,$step=0)
    {
        $enquiry=Enquiry::find($id);
        return view('enquiry.detail',compact('id','enquiry','step'));
    }

    public function store($id,Request $request)
    {
        EnqActivity("Add Enquires Detail",$id);
        $EnquiryDetail=new EnquiryDetail();
        $EnquiryDetail->enquiry_id=$id;
        $data = $request->all();
        $EnquiryDetail->data = json_encode($data);
        $EnquiryDetail->remark = $request->remark;
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }

    public function Show($id,$step=0)
    {
        $enquiry=Enquiry::find($id);
        $enquirydetail=EnquiryDetail::where('enquiry_id',$enquiry->id)->first();
        $last=$enquirydetail->data;
        return view('enquiry.editdetail',compact('id','enquiry','enquirydetail','last','step'));
    }

    public function Update($id,Request $request)
    {
        EnqActivity("Update Enquires Detail.",$id);
        // $EnquiryDetail=EnquiryDetail::find($id);
        $EnquiryDetail=EnquiryDetail::where('enquiry_id',$id)->first();
        $EnquiryDetail->data = json_encode($request->all());
        $EnquiryDetail->remark = $request->remark;
        $EnquiryDetail->is_conform = null;
        $EnquiryDetail->approve_by = null;
        $EnquiryDetail->save();
        return redirect(route('Enquires.index'));
    }

    public function detail($id,$active=1)
    {
        $enquiry=Enquiry::with('Details','Application','Assessment','Transaction','TransactionCredit')->has('Details')->where('id',$id)->first();
        if(empty($enquiry))
        {
            return redirect()->route('EnquiryDetail.add',['id'=>$id])->withError("Details doesn't exist. Please fill the details.");
            abort(401, 'Page not found');
        }
        $enquiry->Details->data=$enquiry->Details->data;

        return view('enquiry.detail_ui.index',compact('enquiry','active'));
    }

    public function conform_document($id,Request $request)
    {
        EnquiryDetail::where('enquiry_id', $id)
      ->update(['is_conform' => 1 , 'approve_by' =>\Auth::user()->id]);
      Document::where('enquiry_id', $id)
      ->update(['status' => 'approved' , 'reviewer' =>\Auth::user()->id]);
    //   $enquiry->Documents

       return redirect()->back()->withInfo("Successfully Verify Enquiry Detail.");
    }
}

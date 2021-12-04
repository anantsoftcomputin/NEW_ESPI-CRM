<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\EnquiryDetail;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
   public function store(Request $request,$mode="add")
   {

        $validated = $request->validate([
            'enquiry' => 'required|max:255',
            'title' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc',
        ]);


        $document=New Document();
        $document->company_id=\Auth::user()->company_id;
        $document->added_by=\Auth::user()->id;
        $document->enquiry_id=$request->enquiry;
        $document->name=$request->title;
        $path = $request->file('file')->store(
            "enquiry/".$request->enquiry.'/documents', 'public'
        );
        $document->file_name="storage/".$path;
        $document->status='draft';
        $document->type=$request->file->getMimeType();
        $document->save();

        if($mode=="add")
            return redirect(route('EnquiryDetail.add',['id'=>$request->enquiry,'step'=>"5"]))->withSuccess('Document Added Successfully.');
        else
            return redirect(route('EnquiryDetail.Show',['id'=>$request->enquiry,'step'=>"5"]))->withSuccess('Document Added Successfully.');

   }

   public function remove($id,$mode="add")
   {
        $document=Document::find($id);
        $document->delete();

        if($mode=="add")
            return redirect(route('EnquiryDetail.add',['id'=>$document->enquiry_id,'step'=>"5"]))->withSuccess('Document Deleted Successfully.');
        else
            return redirect(route('EnquiryDetail.Show',['id'=>$document->enquiry_id,'step'=>"5"]))->withSuccess('Document Deleted Successfully.');

   }
}

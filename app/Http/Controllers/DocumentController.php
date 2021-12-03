<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
   public function store(Request $request)
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

        return redirect(route('EnquiryDetail.add',['id'=>$request->enquiry,'step'=>"#example-basic-h-5"]))->withSuccess('Document Added Successfully.');
   }
}

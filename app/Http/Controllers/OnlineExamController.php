<?php

namespace App\Http\Controllers;

use App\Models\EnquiryOnlineExam;
use Illuminate\Http\Request;

class OnlineExamController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "enquiry_id"=> 'required',
            "type_exam"=> 'required',
            "status"=> 'required',
            "exam_date"=> 'required',
            "marks"=> 'required',
        ]);
        // $response
        $list=config('espi.online_exam_pattern');
        $exam_pattern_value=array();
        $i=0;
        foreach($list[$request->type_exam] as $item)
        {
            // dd($request->marks[$i]);
            array_push($exam_pattern_value,$request->marks[$i]);
            $i++;
        }

            $Enquiry= new EnquiryOnlineExam();
            $Enquiry->enquiry_id=$request->enquiry_id;
            $Enquiry->type_exam=$request->type_exam;
            $Enquiry->exam_pattern=json_encode($list[$request->type_exam]);
            $Enquiry->exam_pattern_value=json_encode($request->marks);
            $Enquiry->status=$request->status;
            $Enquiry->exam_date=$request->exam_date;
            $Enquiry->company_id=1;
            $Enquiry->save();
            $response=array();
            $response['status']=1;
            $response['msg']='Added';
            return response()->json($response, 200);
//        response()->json(['message' => $error], Response::HTTP_BAD_REQUEST)

    }

    public function remove($id)
    {
        $exam=EnquiryOnlineExam::findOrFail($id);
        $exam->delete();
        return redirect()->back()->withInfo('Remove Exam Detail Successfully.');;
    }
}

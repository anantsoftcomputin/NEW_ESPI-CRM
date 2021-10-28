<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseRecruitments;
use App\Models\assessment;
use App\Models\UserDocuments;
use DataTables;

class UploadDocumentController extends Controller
{
    //
    public function index(Request $request)
    {
      if ($request->ajax()) {
         $data = UserDocuments::select('*');
         return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function($row){
                 })
                 ->rawColumns(['action'])
                 ->make(true);
     }
     return view('uploaddocument.view_document');

    }

    public function assessment_upload($assessment_id)
     {
        $assessment=assessment::find($assessment_id);
        $course_id=$assessment->course_id;
        $CourseRecruitments=CourseRecruitments::where("course_id",$assessment->course_id)
        ->where("status","=","active")
        ->get();
        return view("uploaddocument.add",compact("CourseRecruitments","assessment_id","course_id"));
     }

     public function store(Request $request)
     {
        $course_recruitment_id=count($request->course_recruitment_id);
        $validate_array = ['name' => 'required'];
        $fileerrors="";
        $answers=array();
        for($x=0; $x<$course_recruitment_id; $x++) {
            $base=basename($request->filepath[$x], ".d").PHP_EOL;
            $infoPath = pathinfo($base);
            $extension=$infoPath['extension'];
            $request->type[$x];
            $string =$request->filepath[$x];
            $prefix = "files/";
            $index = strpos($string, $prefix) + strlen($prefix);
            $FileName = substr($string, $index);

            if(trim($extension)==trim($request->type[$x]))
            {
               $answers[] = [
                  'filename' =>$FileName,
                  'type' =>$extension,
                  'assessment_id' =>$request->assessment_id,
                  'course_recruitment_id'=>$request->course_recruitment_id[$x],
                  'course_id'=>$request->course_id
              ];
            }else{
               $fileerrors .='<li>filename '.$FileName." type is not valid it's valid type is ".$request->type[$x]."</li>";
            }
         }
         if(isset($answers)){
            UserDocuments::insert($answers);
         }
         if(empty($fileerrors))
         {
         }
         else
         {
            return back()->with("fileerrors",$fileerrors);
         }

         $assessment_id=$request->assessment_id;
         $course_id=$request->course_id;
         return redirect()->route("uploaddocument.index",compact("assessment_id","course_id"));
     }

}

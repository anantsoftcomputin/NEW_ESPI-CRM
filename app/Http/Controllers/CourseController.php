<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\Addcourse;
use App\Http\Requests\Course\EditCourse;
use App\Models\Course;
use App\Models\University;
use App\Models\CourseRecruitments;
use App\Models\Intact;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Imports\CourseImport;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::orderBy("id","desc")->select('*')->with('University')->orderBy('id', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = ' <a href="'.route('Course.edit',$row->id).'" class="edit btn btn-primary btn-sm" data-row="'.route('Course.edit',$row->id).'">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $uni=0;
        return view('course.index',compact('uni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $university=University::all();
        $university_selected=$request->input('university');
        if(isset($university))
        {
            return view('course.add',compact('university_selected','university'));
        }
        else
        {


        }

        // $request
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Addcourse $addcourse)
    {
        $validated = $addcourse->validated();
        $validated['added_by']=\Auth::user()->id;
        $validated['company_id']=\Auth::user()->company_id;
        $validated['duration']=$addcourse->duration;
        $validated['application_fees']=$addcourse->application_fees;
        $validated['course_link']=$addcourse->course_link;

        $validated['ten_req']=$addcourse->ten_req;
        $validated['twelve_req']=$addcourse->twelve_req;
        $validated['bachelor_req']=$addcourse->bachelor_req;
        $validated['master_req']=$addcourse->master_req;

        $validated['ists_req']=$addcourse->ists_req;
        $validated['toefl_req']=$addcourse->toefl_req;
        $validated['duolingo_req']=$addcourse->duolingo_req;
        $validated['pte_req']=$addcourse->pte_req;

        $course=Course::create($validated);
        $totdocuments=count($addcourse->documents);
        for($i=0;$i<$totdocuments;$i++)
        {
            if($addcourse->documents[$i])
            {
                $data[]=[
                    "course_id"=>$course->id,
                    "documents"=>$addcourse->documents[$i],
                    "type"=>$addcourse->type[$i],
                    "status"=>$addcourse->document_status[$i],
                    "company_id"=>Auth::user()->company_id,
                ];
            }
        }

        if(isset($data)){
            CourseRecruitments::insert($data);
        }


        return redirect(route('Course.index'))->with("success",'Course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $Course=Course::find($id);
        $university=University::all();
        $course_recruitments=CourseRecruitments::where("course_id",$id)
        ->get();
        $university_selected=$request->input('university');
        if(isset($university))
        {
            return view('course.edit',compact("course_recruitments",'university_selected','university','Course'));
        }
        else
        {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(EditCourse $request,$course)
    {

        $validated = $request->validated();
        $validated['added_by']=\Auth::user()->id;

        $validated['duration']=$request->duration;
        $validated['application_fees']=$request->application_fees;
        $validated['course_link']=$request->course_link;

        $validated['ten_req']=$request->ten_req;
        $validated['twelve_req']=$request->twelve_req;
        $validated['bachelor_req']=$request->bachelor_req;
        $validated['master_req']=$request->master_req;

        $validated['ists_req']=$request->ists_req;
        $validated['toefl_req']=$request->toefl_req;
        $validated['duolingo_req']=$request->duolingo_req;

        $validated['specialization']=$request->specialization;

        $validated['pte_req']=$request->pte_req;

        $validated['company_id']=\Auth::user()->company_id;

        $courses=Course::where("id",$course)->update($validated);

        if(isset($request->course_recruitment_id))
        {
            //Course Requirements Update
            $totDocuments=count($request->course_recruitment_id);
            for($i=0;$i<$totDocuments;$i++)
            {
                if($request->course_recruitment_id[$i])
                {
                    $CourseRecruitments=CourseRecruitments::find($request->course_recruitment_id[$i]);
                    $CourseRecruitments->documents=$request->course_documents[$i];
                    $CourseRecruitments->type=$request->course_type[$i];
                    $CourseRecruitments->status=$request->course_status[$i];
                    $CourseRecruitments->course_id=$course;
                    $CourseRecruitments->save();
                }
            }
        }

        if(isset($request->documents))
        {
            //Course Requirements New Insert

            $totDocuments=count($request->documents);
            for($i=0;$i<$totDocuments;$i++)
            {
                if($request->documents[$i])
                {
                    $data[]=[
                        "course_id"=>$course,
                        "documents"=>$request->documents[$i],
                        "type"=>$request->type[$i],
                        "status"=>$request->document_status[$i],
                        "company_id"=>Auth::user()->company_id,
                    ];
                }
            }
        }

        if(isset($data)){
            CourseRecruitments::insert($data);
        }

        return redirect(route('Course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function CourseDetail($uni,Request $request)
    {

        if ($request->ajax()) {
            $data = Course::select('*')->where('university_id',$uni)->with('University');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = ' <a href="'.route('Course.edit',$row->id).'" class="edit btn btn-primary btn-sm" data-row="'.route('Course.edit',$row->id).'">Edit</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('course.index',compact('uni'));
        // return view('course.index');
    }

    public function getCourseFromUniversity($uni)
    {
        return Course::where('university_id',$uni)->get();
    }

    public function getCourse(Request $request)
    {
        return Course::where('university_id',$request->university)
        ->where('course_level',$request->level)
        ->get();
    }

    public function CourseDetail_edit(Request $request)
    {
        $university=University::all();
        $data=Course::find($request->course);
        return view('course.edit',compact('university','data'));
    }

    public function CourseImport()
    {
        return view("course.course_import");
    }

    public function CourseImportPreview(Request $request)
    {
        $validated = $request->validate([
            'file' => 'mimes:csv,xlsx,xls'
        ]);
        $data = Excel::toArray(new CourseImport(), request()->file('file'));
        // dd($data);
        return view("course.import_fields",compact("data"));
    }

    public function CourseImportSave(Request $request)
    {
        $totcourse=count($request->course_name);
        for($i=0;$i<$totcourse;$i++)
        {
            $intake_year = Intact::firstOrNew(array('year' => $request->intake_year[$i]));
            $intake_month = Intact::firstOrNew(array('month' => $request->intake_month[$i]));

            $university = University::firstOrNew(array('name' => $request->university[$i]));
            $university->address="";
            $university->email="";
            $university->status="active";
            $university->added_by=\Auth::user()->id;
            $university->country_id=101;
            $university->company_id=\Auth::user()->company_id;
            $university->save();

            $course=Course::firstOrNew(array('name'=>$request->course_name[$i]));
            $course->university_id=$university->id;
            $course->course_level=$request->course_level[$i] ?? "";
            $course->status="active";
            $course->specialization=$request->specialization[$i];
            $course->duration=$request->duration[$i];
            $course->application_fees=$request->application_fees[$i];
            $course->course_link=$request->course_link[$i];
            $course->intake_year=$intake_year->id;
            $course->intake_month=$intake_month->id;

            $course->ten_req=$request->ten_req[$i];
            $course->twelve_req=$request->twelve_req[$i];
            $course->bachelor_req=$request->bachelor_req[$i];
            $course->master_req=$request->master_req[$i];

            $course->added_by=\Auth::user()->id;
            $course->company_id=\Auth::user()->company_id;
            $course->save();

            if($request->course_requirement[$i])
            {
                $course_requirements=explode("###",$request->course_requirement[$i]);
                $totrequirements=count($course_requirements);
                $course_requirements_type=explode("###",$request->course_requirement_type[$i]);
                for($j=0;$j<$totrequirements;$j++)
                {
                    $requirements_check=CourseRecruitments::where("documents",$course_requirements[$j])
                    ->where("course_id",$course->id)
                    ->first();
                    if(empty($requirements_check)){
                        $requirements_check=new CourseRecruitments();
                    }
                    $requirements_check->documents=$course_requirements[$j] ?? "";
                    $type="jpg";
                    if($course_requirements_type[$j])
                    {
                        if($course_requirements_type[$j]=="pdf" ||$course_requirements_type[$j]=="jpg" || $course_requirements_type[$j]=="doc")
                        {
                            $type=$course_requirements_type[$j];
                        }
                    }

                    $requirements_check->type=trim(strtolower($type));
                    $requirements_check->status="active";
                    $requirements_check->course_id=$course->id;
                    $requirements_check->company_id=\Auth::user()->company_id;
                    $requirements_check->save();
                }
            }

        }
            return redirect()->route("Course.index")->with("success","Courses");
    }

    public function getCourseDetails($course)
    {
        return Course::find($course);
    }
}

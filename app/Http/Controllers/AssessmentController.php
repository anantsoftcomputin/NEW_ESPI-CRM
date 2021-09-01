<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assessment\AddAssessment;
use App\Models\assessment;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Intact;
use DataTables;
class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = assessment::select('*')->with('University','Course');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                            return ucfirst($row->status);
                    })
                    ->addColumn('action', function($row){
                        $btn='<a title="Approved" href="'.route('assessment.status',["id"=>$row->id,"status"=>"approved"]).'" class="btn btn-success mb-2 mr-2 rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </a>';

                        $btn .='<a title="On-Hold" href="'.route('assessment.status',["id"=>$row->id,"status"=>"on-hold"]).'" class="btn btn-info mb-2 mr-2 rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause-circle"><circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line></svg>
                        </a>';   
                        
                        $btn .='<a title="Rejected" href="'.route('assessment.status',["id"=>$row->id,"status"=>"rejected"]).'" class="btn btn-danger mb-2 mr-2 rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>';

                        
                         return $btn;  
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('assessment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($enquiry)
    {
        $university=University::all();
        $course=Course::all();
        $intake=Intact::all();
        return view('assessment.add',compact('enquiry','university','course','intake'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAssessment $AddAssessment)
    {
        $validated = $AddAssessment->validated();
        $validated['added_by_id'] = \Auth::user()->id;
        $validated['type']="default";
        $validated['location']="default";
        assessment::create($validated);
        return redirect(route('assessments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(assessment $assessment)
    {
        //
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Application::where("application_id", "=", $code)->first());
        return $code;
    }

    public function status_change(Request $request)
    {
        assessment::where("id",$request->id)->update(["status"=>$request->status]);
        return redirect(route('assessments.index'));
    }
}

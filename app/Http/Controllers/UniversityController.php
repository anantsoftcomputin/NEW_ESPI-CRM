<?php

namespace App\Http\Controllers;

use App\Http\Requests\University\AddUniversity;
use App\Http\Requests\University\EditUniversity;
use App\Http\Requests\University\UniversityImport;
use App\Models\University;
use App\Models\UniversityCampus;
use App\Models\Country;
use App\Models\CsvData;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Imports\ImportUniversity;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Intact;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('permission:view-university');
        // $this->middleware('permission:create-university', ['only' => ['create','store']]);
        // $this->middleware('permission:update-university', ['only' => ['edit','update']]);
        // $this->middleware('permission:destroy-university', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = University::select('*')->with('Course','Country')->orderBy('id', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn="";
                        if(Auth::user()->hasAnyPermission(['view-course'])){
                           $btn .= ' <a href="'.route('course.detail',$row->id).'" title="View Course" class="btn btn-primary btn-sm" data-row="'.route('course.detail',$row->id).'">Course</a>';
                        }
                        if(Auth::user()->hasAnyPermission(['update-university'])){
                           $btn .= '<a href="'.route('University.edit',$row->id).'" title="Edit University" class="edit btn btn-dark btn-sm mt-2"  data-row="'.route('University.edit',$row->id).'">Edit</a>';
                        }
                        if(Auth::user()->hasAnyPermission(['destroy-university'])){
                            $url=route('University.destroy',$row->id);
                            $btn .='<form action="'.$url.'" method="post">';
                            $btn .='<input type="hidden" name="_method" value="delete" />';
                            $btn .='<input type="hidden" name="_token" value="'.csrf_token().'">';
                            $btn .='<button class="btn btn-danger btn-sm mt-2"> Delete </button></form>';
                           //$btn .= '<a href="'.route('University.edit',$row->id).'" title="Edit University" class="edit btn btn-danger btn-sm mt-2"  data-row="'.route('University.edit',$row->id).'">Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('university.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intake=Intact::select('month','id')->groupBy('month')->orderBy('id','asc')->get();

        $intakeYear=Intact::select('year','id')->groupBy('year')->orderBy('id','asc')->get();

        return view("university.add",compact("intake","intakeYear"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUniversity $AddUniversity)
    {
        $validated = $AddUniversity->validated();

        $validated['added_by']=\Auth::user()->id;

        $validated['intake_year']=$AddUniversity->intake_year;
        $validated['intake_month']=$AddUniversity->intake_month;
        $validated['provision_state']=$AddUniversity->provision_state;
        $validated['application_fees']=$AddUniversity->application_fees;
        $validated['ten_req']=$AddUniversity->ten_req;
        $validated['twelve_req']=$AddUniversity->twelve_req;
        $validated['bachelor_req']=$AddUniversity->bachelor_req;
        $validated['master_req']=$AddUniversity->master_req;
        $validated['ists_req']=$AddUniversity->ists_req;
        $validated['toefl_req']=$AddUniversity->toefl_req;
        $validated['duolingo_req']=$AddUniversity->duolingo_req;
        $validated['pte_req']=$AddUniversity->pte_req;

        // if($AddUniversity->news_letter)
        // {
        //     $avatarPath = $AddUniversity->file('news_letter');
        //     $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
        //     $file = $AddUniversity->file('news_letter');
        //     $filename = 'news-letter-' . time() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('news_letter', $filename);
        //     $validated['news_letter'] =$filename;
        // }

        if($AddUniversity->news_letter)
        {
            $path = $AddUniversity->file('news_letter')->store(
                "Universities/documents/news_letter", 'public'
            );
            $validated['news_letter'] ="storage/".$path;
        }

        if($AddUniversity->application_form)
        {
            $path = $AddUniversity->file('application_form')->store(
                "Universities/documents/application_form", 'public'
            );
            $validated['application_form'] ="storage/".$path;
        }


        $university=University::create($validated);

        //university campus saving

        if(isset($AddUniversity->campus_name))
        {
            $totCampus=count($AddUniversity->campus_name);
            for($i=0;$i<$totCampus;$i++)
            {
                $data[]=[
                    'university_id'=>$university->id,
                    'campus_name'=>$AddUniversity->campus_name[$i],
                    'campus_country'=>$AddUniversity->campus_country[$i],
                    'campus_address'=>$AddUniversity->campus_address[$i],
                    'campus_fees'=>$AddUniversity->campus_fees[$i],
                    'company_id'=>\Auth::user()->company_id,
                ];
            }
            if(isset($data))
            {
                UniversityCampus::insert($data);
            }
        }

        //UniversityCampus
        return redirect(route('University.index'))->with('success','University');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $intake=Intact::select('month','id')->groupBy('month')->orderBy('id','asc')->get();
        $intakeYear=Intact::select('year','id')->groupBy('year')->orderBy('id','asc')->get();
        $university_campus=UniversityCampus::where("university_id",$id)->get();
        $university=University::find($id);
        return view("university.edit",compact("university",'intake','intakeYear','university_campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(EditUniversity $request,$university)
    {
        $validated = $request->validated();
        if($request->has('description'))
        {
            $validated['email']=$request->email;
        }
        $validated['description']=$request->description;
        $validated['intake_year']=$request->intake_year;
        $validated['intake_month']=$request->intake_month;
        $validated['provision_state']=$request->provision_state;
        $validated['application_fees']=$request->application_fees;

        $validated['ten_req']=$request->ten_req;
        $validated['twelve_req']=$request->twelve_req;
        $validated['bachelor_req']=$request->bachelor_req;
        $validated['master_req']=$request->master_req;

        $validated['ists_req']=$request->ists_req;
        $validated['toefl_req']=$request->toefl_req;
        $validated['duolingo_req']=$request->duolingo_req;
        $validated['pte_req']=$request->pte_req;

        if($request->news_letter)
        {
            $path = $request->file('news_letter')->store(
                "Universities/documents/news_letter", 'public'
            );
            $validated['news_letter'] ="storage/".$path;
        }

        if($request->application_form)
        {
            $path = $request->file('application_form')->store(
                "Universities/documents/application_form", 'public'
            );
            $validated['application_form'] ="storage/".$path;
        }


        // Update University
        $universitys=University::where("id",$university)->update($validated);

        if(isset($request->university_campus_id))
        {
            //University Campus Details Update
            $totCampus=count($request->university_campus_id);
            for($i=0;$i<$totCampus;$i++)
            {
                if($request->university_campus_id[$i])
                {
                    $UniversityCampus=UniversityCampus::find($request->university_campus_id[$i]);
                    $UniversityCampus->campus_name=$request->university_campus_name[$i];
                    $UniversityCampus->campus_country=$request->university_campus_country[$i];
                    $UniversityCampus->campus_address=$request->university_campus_address[$i];
                    $UniversityCampus->university_id=$university;
                    $UniversityCampus->save();
                }
            }
        }

        if(isset($request->campus_name))
        {
            //University Campus New Insert

            $totCampus=count($request->campus_name);
            for($i=0;$i<$totCampus;$i++)
            {
                if($request->campus_name[$i])
                {
                    $data[]=[
                        "university_id"=>$university,
                        "campus_name"=>$request->campus_name[$i],
                        "campus_country"=>$request->campus_country[$i],
                        "campus_address"=>$request->campus_address[$i],
                        "campus_fees"=>$request->campus_fees[$i],
                        "company_id"=>Auth::user()->company_id,
                    ];
                }
            }
        }

        if(isset($data)){
            UniversityCampus::insert($data);
        }

        return redirect(route('University.index'))->with("University")->withInfo(ucfirst($request->name).' University Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy($university)
    {
        $university=University::find($university);
        foreach($university->Course as $course)
        {
            $course->delete();
        }
        $university->delete();
        return redirect(route('University.index'))->withSuccess('Deleted Successfully');
    }

    public function getUniversityFromCountry($country_id)
    {
        return University::where('country_id',$country_id)
        ->with(['Course' => function ($query) {

        }])->get();

        if($university->relation()->exists())
        {
            return $university;
        }
        else
        {
            return "";
        }
    }

    public function UniversityImport()
    {
        return view("university.import_form");
    }

    public function processImport(Request $request)
    {
        $validated = $request->validate([
            'file' => 'mimes:csv,xlsx,xls'
        ]);
        $data = Excel::toArray(new ImportUniversity(), request()->file('file'));
        return view("university.import_fields",compact("data"));

    }

    function university_import_save(Request $request)
    {
        $totuniversity=count($request->name);
        for($i=0;$i<$totuniversity;$i++)
        {
            $country = Country::firstOrNew(array('name' => $request->country[$i]));
            $intake_year = Intact::firstOrNew(array('year' => $request->intake_year[$i]));
            $intake_month = Intact::firstOrNew(array('month' => $request->intake_month[$i]));

            $university = University::firstOrNew(array('name' => $request->name[$i]));
            $university->description = $request->description[$i];
            $university->address=$request->address[$i];
            $university->phone=$request->phone[$i];
            $university->email=$request->email[$i];
            $university->status="active";
            $university->country_id=$country->id;
            $university->provision_state=$request->provision_state[$i];
            $university->intake_year=$intake_year->id;
            $university->intake_month=$intake_month->id;
            $university->application_fees=$request->application_fees[$i];
            $university->web=$request->web[$i];

            $university->ten_req=$request->ten_req[$i];
            $university->twelve_req=$request->twelve_req[$i];
            $university->bachelor_req=$request->bachelor_req[$i];
            $university->master_req=$request->master_req[$i];


            $university->company_id=\Auth::user()->company_id;
            $university->added_by=\Auth::user()->id;

            $university->save();

            if(isset($request->campus_name[$i]))
            {
                if($request->campus_name[$i])
                {
                    $campus_name=explode("###",$request->campus_name[$i]);
                    $totCampus=count($campus_name);
                    $campus_country=explode("###",$request->campus_country[$i]);
                    $campus_address=explode("###",$request->campus_address[$i]);
                    $campus_fees=explode("###",$request->campus_fees[$i]);
                    for($j=0;$j<$totCampus;$j++)
                    {
                        $campus_check=UniversityCampus::where("campus_name",$campus_name[$j])
                        ->where("university_id",$university->id)
                        ->first();
                        if(empty($requirements_check)){
                            $campus_check=new UniversityCampus();
                        }
                        $campus_check->university_id=$university->id;
                        $country=Country::firstOrNew(array('name'=>trim($campus_country[$i])));

                        $campus_check->campus_name=$campus_name[$j] ?? "";
                        $campus_check->campus_country=$country->id ?? "";
                        $campus_check->campus_fees=$campus_fees[$j] ?? "";
                        $campus_check->campus_address=$campus_address[$j] ?? "";

                        $campus_check->company_id=\Auth::user()->company_id;
                        $campus_check->save();
                    }
                }
            }
        }
        return redirect(route('University.index'))->with("success","University");
    }

    function university_campus_delete($id)
    {
        return UniversityCampus::where("id",$id)->delete();
    }
}

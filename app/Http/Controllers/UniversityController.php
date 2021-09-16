<?php

namespace App\Http\Controllers;

use App\Http\Requests\University\AddUniversity;
use App\Http\Requests\University\EditUniversity;
use App\Http\Requests\University\UniversityImport;
use App\Models\University;
use App\Models\Country;
use App\Models\CsvData;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Imports\ImportUniversity;
use Maatwebsite\Excel\Facades\Excel;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:view-university');
        $this->middleware('permission:create-university', ['only' => ['create','store']]);
        $this->middleware('permission:update-university', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-university', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = University::select('*')->with('Course');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn="";
                        if(Auth::user()->hasAnyPermission(['view-course'])){
                           $btn .= ' <a href="'.route('course.detail',$row->id).'" title="View Course" class="btn btn-primary btn-sm" data-row="'.route('course.detail',$row->id).'">Course</a>';
                        }
                        if(Auth::user()->hasAnyPermission(['update-university'])){
                           $btn .= '<a href="'.route('University.edit',$row->id).'" title="Edit University" class="edit btn btn-primary btn-sm mt-2"  data-row="'.route('University.edit',$row->id).'">Edit</a>';
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
        return view("university.add");
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
        $university=University::create($validated);
        return redirect(route('University.index'));
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
       $university=University::find($id);
       return view("university.edit",compact("university"));
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
        $university=University::where("id",$university)->update($validated);
        return redirect(route('University.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
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

    public function processImport() 
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

            $university = University::firstOrNew(array('name' => $request->name[$i]));
            $university->description = $request->description[$i];
            $university->address=$request->address[$i];
            $university->phone=$request->phone[$i];
            $university->email=$request->email[$i];
            $university->status="active";
            $university->country_id=$country->id;
            $university->company_id=\Auth::user()->company_id;
            $university->added_by=\Auth::user()->id;
            $university->save();
        }
        return redirect(route('University.index'))->with("success","University");
    }
}

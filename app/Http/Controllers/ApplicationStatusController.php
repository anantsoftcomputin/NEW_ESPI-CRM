<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;

class ApplicationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ApplicationStatus::select('*')->with('Country');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn="";
                        $btn.='<a class="btn btn-info rounded-circle bs-tooltip mr-1" title="Edit" onclick="edit_status('.$row->id.');" data-item="'.$row.'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
                        // if($row->visibility==0)
                        // {
                        //     $btn.='<a class="btn btn-warning rounded-circle bs-tooltip mr-1" title="Show" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';
                        // }
                        // else
                        // {
                        //     $btn.='<a class="btn btn-warning rounded-circle bs-tooltip mr-1" title="Hide" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></a>';
                        // }

                        $btn.='<a class="btn btn-danger rounded-circle bs-tooltip" title="Delete" onclick="delet_status('.$row->id.')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>';
                            return $btn;
                    })
                    ->addColumn('date', function($model) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i:s');
                    })
                    ->addColumn('visibility', function($model) {
                        if($model->visibility==0)
                        {
                            return '<a href="'.route("ApplicationStatus.UpdateVisibility",['id'=>$model]).'" class="badge badge-danger">InVisible</a>';
                        }
                        else
                        {
                            return '<a href="'.route("ApplicationStatus.UpdateVisibility",["id"=>$model]).'" class="badge badge-success">Visible</a>';
                        }
                    })
                    ->rawColumns(['action','processor_id','visibility'])
                    ->make(true);
        }
        return view('ApplicationStatus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'countries_id' => 'required',
        ]);
        $applicationStatus= new ApplicationStatus();
        $applicationStatus->company_id=\Auth::user()->company_id;
        $applicationStatus->status=$request->status;
        $applicationStatus->countries_id=$request->countries_id;
        $applicationStatus->save();
        return redirect()->back()->withSuccess('Application Status.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApplicationStatus  $applicationStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ApplicationStatus::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplicationStatus  $applicationStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationStatus $applicationStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplicationStatus  $applicationStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$applicationStatus)
    {
        $request->validate([
            'status' => 'required',
            'countries_id' => 'required',
        ]);
        $applicationStatus=ApplicationStatus::find($applicationStatus);
        $applicationStatus->company_id=\Auth::user()->company_id;
        $applicationStatus->status=$request->status;
        $applicationStatus->countries_id=$request->countries_id;
        $applicationStatus->save();
        return redirect()->back()->withInfo('Updated Aplication Status.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplicationStatus  $applicationStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($applicationStatus)
    {
        ApplicationStatus::find($applicationStatus)->delete();
        return json_encode(['active'=>1]);
    }

    public function UpdateVisibility($id)
    {
        $satats=ApplicationStatus::find($id);
        if($satats->visibility==1)
        {
            $satats->visibility=0;
            $satats->save();
        }
        else
        {
            $satats->visibility=1;
            $satats->save();
        }
        return redirect()->back()->withInfo("Updated Successfully.");
    }
}

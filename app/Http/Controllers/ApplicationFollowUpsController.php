<?php

namespace App\Http\Controllers;

use App\Models\ApplicationFollowUps;
use Illuminate\Http\Request;
use DataTables;

class ApplicationFollowUpsController extends Controller
{
    public function store(Request $request,$application_id)
    {
        $request->validate([
            'date' => 'required',
            'status' => 'required',
            'note' => 'required',
        ]);

        $followUp=New ApplicationFollowUps();
        $followUp->date=$request->date;
        $followUp->status=$request->status;
        $followUp->note=$request->note;
        if($request->has('parent_id'))
        {
            $followUp->parent_id=$request->parent_id;
        }
        $followUp->application_id=$application_id;
        $followUp->company_id=\Auth::user()->company_id;
        $followUp->assist_by=\Auth::user()->id;
        $followUp->save();

        // if($followUp->status=="Fail")
        // {
        //     $Enquire->status="Failed";
        //     $Enquire->save();

        // }
        return redirect()->back()->withSuccess('Follow Up.');
    }

    public function reschedule(Request $request,$application_id)
    {
        $request->validate([
            'date' => 'required',
            'parent_id' => 'required',
            'note' => 'required',
        ]);

        $perent=ApplicationFollowUps::find($request->parent_id);
        $perent->is_resolved="1";
        $perent->save();
        $followUp=New ApplicationFollowUps();
        $followUp->date=$request->date;
        $followUp->status=$perent->status;
        $followUp->note=$request->note;
        $followUp->parent_id=$request->parent_id;
        $followUp->application_id=$application_id;
        $followUp->company_id=\Auth::user()->company_id;
        $followUp->assist_by=\Auth::user()->id;
        $followUp->save();

        // if($followUp->status=="Fail")
        // {
        //     $Enquire->status="Failed";
        //     $Enquire->save();

        // }
        return redirect()->back()->withSuccess('Follow Up.');
    }

    public function resolved($id,$status)
    {
        $FollowUp=ApplicationFollowUps::find($id);
        $FollowUp->is_resolved=$status;
        $FollowUp->save();
        return redirect()->back()->withSuccess("Status");
    }

    public function ListByEnquiry($enq,Request $request)
    {
        if ($request->ajax()) {
            $data = ApplicationFollowUps::select('*')->where('application_id', $enq)->with('user');
            if(\Auth::user()->roles->first()->name != 'super-admin')
            {
                $data->where('assist_by',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->orderColumn('date', 'date')
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('Application.edit',$row->id).'" class="edit btn btn-primary btn-sm">Change Status</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        else
        {
            $data = FollowUp::select('*')->where('enquiry_id', $enq)->with('user')->get();
            return response()->json([
                'data' => $data,
            ]);
        }
    }


}

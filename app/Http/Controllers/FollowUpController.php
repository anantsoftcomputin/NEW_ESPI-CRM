<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\FollowUp;
use Illuminate\Http\Request;
use DataTables;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ListByEnquiry($enq,Request $request)
    {
        if ($request->ajax()) {
            $data = FollowUp::select('*')->where('enquiry_id', $enq)->with('user');
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

    public function index()
    {
        //
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
    public function store(Enquiry $Enquire,Request $request)
    {
        $request->validate([
            'date' => 'required',
            'status' => 'required',
            'note' => 'required',
        ]);

        $followUp=New FollowUp();
        $followUp->date=$request->date;
        $followUp->status=$request->status;
        $followUp->note=$request->note;
        $followUp->enquiry_id=$Enquire->id;
        $followUp->company_id=\Auth::user()->company_id;
        $followUp->assist_by=\Auth::user()->id;
        $followUp->save();
        return redirect()->back()->withSuccess('IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUp $followUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function edit(FollowUp $followUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FollowUp $followUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowUp $followUp)
    {
        //
    }
}

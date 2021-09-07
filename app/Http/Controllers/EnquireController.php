<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Requests\enquire\AddEnquireRequest;
use Mail;
use DataTables;
use App\Models\EnquiryDetail;
use App\Mail\AddEnquiry;
use App\Models\User;

class EnquireController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-enquiry');
        $this->middleware('permission:create-enquiry', ['only' => ['create','store']]);
        $this->middleware('permission:update-enquiry', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-enquiry', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Enquiry::select('*')->with('City','State','Country');

            if(\Auth::user()->roles->pluck('name')=="Counsellor")
            {
                $data->where('counsellor_id',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('api/admin/inquiry/'.$user->id);
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "";
                           if($this->existdetail($row->id))
                           {
                            $btn .='<a href="'.route('Assessment.Add',$row->id).'" class="assessment btn btn-warning btn-sm">Add Assessment</a>';
                           }
                           else
                           {
                               $btn .='<a href="'.route('EnquiryDetail.add',$row->id).'" class="assessment btn btn-info btn-sm">Add Detail Enquiry</a>';
                           }
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('enquiry.index');
    }

    public function existdetail($id)
    {
        return EnquiryDetail::where('enquiry_id',"=",$id)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::role('Counsellor')->get();
        //$user=User::where('company_id','1')->whereNotIn('id',[\Auth::user()->id])->get();
        return view('enquiry.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEnquireRequest $request)
    {
        $validated = $request->validated();
        $validated['added_by_id'] = \Auth::user()->id;
        $validated["referance_source"]=$request->referance_source;
        $validated["remarks"]=$request->remarks;
        $enq=Enquiry::create($validated);
        // $details = [
        //         'title' => 'New Enquires from '.$request->name,
        //         'url' => url('/login'),
        //         'enq_id' => $enq->id
        //     ];
        // Mail::to($request->email)->send(new AddEnquiry($details));
        return view('success',compact('enq'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiri $enquiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiri $enquiri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiri $enquiri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiri $enquiri)
    {
        //
    }

}

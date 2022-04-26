<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\EnquiryDetail;
use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= User::all();
        $data_Transaction= Transaction::all();

        return view('report.general', compact('data','data_Transaction'));
        // $page ="Report";
        // return view('report.general',compact('page'));
    }
    public function general()
    {
      //  $page ="Report";
        $data= User::where('id')->get();
        return view('report.general', compact('data'));

    }
    public function daily_report(){
        echo "hello";
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();

        // $data['alldata'] = Expense::leftJoin('expense_purpose', 'expense_purpose.id', 'expenses.purpose_id')
        // ->where('expenses.date', $dateFrom)
        // ->select('expenses.*', 'expense_purpose.purpose_name')
        // ->orderBy('expenses.date', 'asc')
        // ->get();


        $Transaction['alldata'] = Transaction::leftJoin('transactions' ,'transactions.id', 'title', 'payment_mode', 'price','created_at')
                        ->whereBetween('created_at', [$start_date, $end_date])
                        ->select('transactions*')
                        ->get();
            // print_r($data);die;
        $Transaction['getJsonArr'] = json_decode(json_encode($Transaction['alldata']),True);
        $Transaction['hasData'] = 1;
        return view('report.general', compact('Transaction'));

   //return User::whereBetween('created_at',[$start_date,$end_date])->get();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $enquiry=Enquiry::all();
        $enquirydetail=EnquiryDetail::where('enquiry_id',$enquiry->id)->first();

        return view('report.general',compact('id','enquiry','enquirydetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}

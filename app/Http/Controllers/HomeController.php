<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use App\Models\Course;
use App\Models\Intact;
use App\Models\Enquiry;
use App\Models\Application;
use App\Models\assessment;
use App\Models\Country;
use DataTables;
use App\Models\AssignCounsellor;

use Carbon\Carbon;
use GuzzleHttp\RetryMiddleware;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
   {
        $university=University::all();
        $course=Course::all();
        $Enquiry=Enquiry::all();
        
        $intake=Intact::all();
        //  $Application=Application::with('Enquiry.University')->get();
        $user=User::role('Counsellor')->get();
        $Application = Application::join('enquiries', 'enquiries.id', '=', 'applications.enquiry_id')
        ->join('universities', 'universities.id', '=', 'applications.university_id')
        ->get(['applications.*', 'enquiries.name','universities.name as currency_name']);
        

        $assessment = assessment::join('enquiries', 'enquiries.id', '=', 'assessments.enquiry_id')
        ->where('assessments.status', '!=', 'approved')
        ->get(['assessments.*', 'enquiries.name','enquiries.enquiry_id']);
        // $assessment = assessment::select('assessments.*')->where('assessments.status', '!=', 'approved')
        // ->groupBy('enquiry_id')
        // ->with('University','Course','User','Enquiry','University.Country');
        
        return view('home',compact("Enquiry","user","university","course","intake","Application","assessment"));
    }

    public function front_end()
    {
        return view('coming_soon');
    }

    public function ocr()
    {
        return view("ocr.index");
    }
    public function search(Request $request){
       
        $search = $request->input('search');
  
        $Enquiry = Enquiry::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->get();
                
                    
                    $Application = Application::join('enquiries', 'enquiries.id', '=', 'applications.enquiry_id')
                    ->join('universities', 'universities.id', '=', 'applications.university_id')
                    ->get(['applications.*', 'enquiries.name','universities.name as currency_name']);
                
                 
            
                    $assessment = assessment::join('enquiries', 'enquiries.id', '=', 'assessments.enquiry_id')
                    ->where('assessments.status', '!=', 'approved')
                    ->get(['assessments.*', 'enquiries.name','enquiries.enquiry_id']);
                    // $assessment = assessment::select('assessments.*')->where('assessments.status', '!=', 'approved')
                    // ->groupBy('enquiry_id')
                    // ->with('University','Course','User','Enquiry','University.Country');

        return view('home', compact('Enquiry','Application','assessment'));
    }
   
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use App\Models\Course;
use App\Models\Intact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $university=University::all();
        $course=Course::all();
        $intake=Intact::all();
        $user=User::role('Counsellor')->get();
        return view('home',compact("user","university","course","intake"));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\Addcourse;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::select('*')->with('University');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                            return "#";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $uni=0;
        return view('course.index',compact('uni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $university=University::all();
        $university_selected=$request->input('university');
        if(isset($university))
        {
            return view('course.add',compact('university_selected','university'));
        }
        else
        {


        }

        // $request
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Addcourse $addcourse)
    {
        $validated = $addcourse->validated();
        $validated['added_by']=\Auth::user()->id;
        $validated['company_id']=\Auth::user()->company_id;
        $course=Course::create($validated);

        return redirect(route('Course.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function CourseDetail($uni,Request $request)
    {
        if ($request->ajax()) {
            $data = Course::select('*')->where('university_id',$uni)->with('University');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                        //    $btn .= ' <a href="'.route('course.detail',$row->id).'" class="edit btn btn-primary btn-sm" data-row="'.route('course.detail',$row->id).'">Course</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('course.index',compact('uni'));
        // return view('course.index');
    }

    public function getCourseFromUniversity($uni)
    {
        return Course::where('university_id',$uni)->get();
    }
}

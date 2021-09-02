<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use DataTables;
use App\Http\Requests\Permission\EditPermission;
use App\Http\Requests\Permission\AddPermission;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-permission');
        $this->middleware('permission:create-permission', ['only' => ['create','store']]);
        $this->middleware('permission:update-permission', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Manage Permissions';
        $permissions = Permission::all();
        if ($request->ajax()) {
            $data = Permission::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('permissions.edit',$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('permissions.index');

        //return view('permissions.index', compact('permissions','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Permission';
        return view('permissions.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach (explode(',',$request->name) as  $perm) {
            $permission = Permission::create(['name' => $perm]);
            $permission->assignRole('super-admin');
        }
        return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        $permission=Permission::find($id);
        return view("permissions.edit",compact("permission"));
    }

    public function update(EditPermission $request,$permission)
    {
        $validated = $request->validated();
        $permissions=Permission::where("id",$permission)->update($validated);
        $per=Permission::find($permission);
        $per->assignRole('super-admin');
        return redirect()->route('permissions.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\AddUser;
use App\Http\Requests\User\EditUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:view-user');
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title = 'Manage Users';
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        if($row->status=="1")
                        {
                            $status="Active-User";
                        }else{
                            $status="De-Active";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('users.edit',$row->id).'" title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';
                        if($row->hasRole('super-admin'))
                        {
                            $btn="";
                        }
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create user';
        $roles = Role::pluck('name', 'id');
        return view('user.add', compact('roles', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUser $request)
    {
        //dd($request);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->status=$request->status;
        $user->company_id=\Auth::user()->company_id;
        $user->added_by=\Auth::user()->id;
        $user->fcm_token=$request->notification ? $request->fcm_token : '';
        $user->save();
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with("success","User");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "User Details";
        $roles = Role::pluck('name', 'id');

        return view('user.edit', compact('user','title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, User $user)
    {
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if(isset($request->password))
        {
            $user->password=Hash::make($request->password);
        }
        $user->status=$request->status;
        $user->fcm_token=$request->fcm_token;
        $user->company_id=\Auth::user()->company_id;
        $user->added_by=\Auth::user()->id;
        $user->fcm_token=$request->notification ? $request->fcm_token : '';
        $user->save();
        $user->syncRoles($request->role);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveToken(Request $request)
    {
        $user=\Auth::user();
        $user->fcm_token=$request->token;
        $user->save();
        $token=$request->token;
        $array=["token"=>$token];
        return json_encode($array);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();

        $SERVER_API_KEY = 'XXXXXX';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}

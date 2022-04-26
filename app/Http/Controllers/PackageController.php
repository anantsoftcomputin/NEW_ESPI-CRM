<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Package;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Package\EditPackage;
use App\Http\Requests\Package\AddUser;


use DB;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Manage Package';
        if ($request->ajax()) {
            $data = Package::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()


                    ->addColumn('action', function($row){
                        $btn = "";
                        $btn = '<a href="'.route('package.edit',$row->id).'" title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';
                        // $btn = '<a href="'.route('card.destroy',$row->id).'" title="Delete" class="edit btn btn-danger btn-sm">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
        return view('package.index');
    }
    public function create()
    {
      //  $title = 'Create user';
        //$roles = Role::pluck('name', 'id');
        return view('package.add');
    }
    public function store (Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'card_number'=>'required|numeric',
        //     'note'=>'required',
        //     'title'=>'required'
        // ]);
        print_r($request->all());
        $transaction=new Package();
        $transaction->name=$request->name;
        $transaction->price=$request->price;
        $transaction->start_date=$request->start_date;
        $transaction->date=$request->date;
        $transaction->status=$request->status;
        $transaction->note=$request->note;
        $transaction->company_id=\Auth::user()->company_id;
        $transaction->save();
        return redirect()->back()->withInfo('Add  Package SuccessFully.');
    }
    public function edit(Package $Package)
    {
        $title = "User Details";
        $roles = Role::pluck('name', 'id');

        return view('package.edit', compact('Package','title', 'roles'));
    }
    public function update(EditPackage $request, Package $Package)
    {

        $Package->name=$request->name;
        $Package->price=$request->price;
        $Package->start_date=$request->start_date;
        $Package->date=$request->date;
        $Package->status=$request->status;
        $Package->note=$request->note;
        $Package->company_id=\Auth::user()->company_id;
        $Package->save();


        return redirect()->route('package.index');
    }
    public function destroy($id) {
        $Card = Package::findOrFail($id);
        $Card->delete();
        return redirect('package.index');
     }
     public function show($id)
     {
         //
     }
}

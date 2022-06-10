<?php
namespace App\Http\Controllers;

use App\Http\Requests\Task\EditTask;
use DataTables;
use App\Models\Card;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;
use store;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;

class TaskController extends Controller
{
    public function index(Request $request ,Task $Task)
    {
        $title = 'Manage Task';
        if ($request->ajax()) {
            $data = Task::with(['alluser'])->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){
                        $btn = "";
                         $btn .='<a href="'.route('task.edit',$row->id).'" style="background: #9b59b6; color: #fff;" class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="Edit "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
                        //    $btn .='<a href="'.route('task.destroy',$row->id).'" style="background: #ef1207; color: #fff;" class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="Delete "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
                $user_info = DB::table('tasks')
                ->select('Status', DB::raw('count(*) as total'))
                ->groupBy('Status')
                ->get();
// print_r($user_info);die;
        return view('task.index',compact('Task','user_info'));
    }
    public function create()
    {
      //  $title = 'Create user';
        //$roles = Role::pluck('name', 'id');
        $user=User::all();
        return view('task.add',compact('user'));
    }
    public function store (Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'file'=>'required'
        ]);
        // print_r($request->all());
        $transaction=new Task();
        $transaction->subject=$request->subject;
        $transaction->start_date=$request->start_date;
        $transaction->date=$request->date;
        $transaction->Priority=$request->Priority;
        $transaction->Related=$request->Related;
        $transaction->Assignees=$request->Assignees;
        $transaction->Followers=$request->Followers;
        $transaction->note=$request->note;
        $transaction->Status=$request->Status;
        $path = $request->file('file')->store( 'task', 'public');
        $transaction->file_name="storage/".$path;
        $transaction->company_id=\Auth::user()->company_id;
        // print_r($transaction);die;
        $transaction->save();
        return redirect()->back()->withInfo('Add  Task  SuccessFully.');
    }
    public function edit(Task $Task)
    {
        $title = "Card Details";
        $roles = Role::pluck('name', 'id');
        $user=User::all();

        return view('Task.edit', compact('Task','title', 'roles','user'));
    }

    public function update(EditTask $request, Task $Task)
    {

        $Task->subject=$request->subject;
        $Task->start_date=$request->start_date;
        $Task->date=$request->date;
        $Task->Priority=$request->Priority;
        $Task->Related=$request->Related;
        $Task->Assignees=$request->Assignees;
        $Task->Followers=$request->Followers;
        $Task->Status=$request->Status;
        $path = $request->file('file')->store( 'task', 'public');
        $Task->file_name="storage/".$path;
        $Task->company_id=\Auth::user()->company_id;

        $Task->save();

// print_r($Card);die;
        return redirect()->route('task.index');
    }
    public function destroy($id)
    {
        $task=Task::find($id);
        $task->delete();
        return view('task.index');
    }
    public function Status(EditTask $request, Task $Task)
    {
        $Task->Status=$request->Status;
        $Task->save();

        return redirect()->back()->withInfo('Add Task Status SuccessFully.');
    }

    public function ChangeStatus($id,$status)
    {
        $Task=Task::find($id);
        $Task->status=$status;
        $Task->save();
        return redirect()->back()->withInfo("Updated Status Successfully.");
    }
}

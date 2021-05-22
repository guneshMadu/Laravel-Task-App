<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyTask;
class TaskController extends Controller
{
    public function store(Request $request){
       // dd($request->all());
        
        $task=new DailyTask();
        $this->validate($request,[
            'task_text'=>'required|max:100|min:5',
        ]);
        $task->task=$request->task_text;
        $task->save();

        //return view('home')->with();

        return redirect()->back();
    
    }
    
    public function markFun($id){
        $up=DailyTask::find($id);
        $up->iscompleted=1;
        $up->save();
        return redirect()->back();
    }

    public function marknotFun($id){
        $down=DailyTask::find($id);
        $down->iscompleted=0;
        $down->save();
        return redirect()->back();
    }

    public function deleteFun($id){
        $del=DailyTask::find($id);
        $del->delete();
        return redirect()->back();
    }

    public function updateTask($id){
        $task=DailyTask::find($id);
        return view('up')->with('tskdata',$task);
    }

    public function updateTaskNew(Request $request){
        $id=$request->id;
        $task=$request->task_update_text;
        $data=DailyTask::find($id);
        $data->task=$task;
        $data->save();
        $datas=DailyTask::all();
        return redirect('/home');
    }
    


}

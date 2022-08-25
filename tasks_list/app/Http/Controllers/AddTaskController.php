<?php

namespace App\Http\Controllers;

use App\Models\AddTask;
use Illuminate\Http\Request;

class AddTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AddTask::all();
        return view('task', compact('data'));
    }

    public function fetch_tasks()
    {
        $task = AddTask::all();
        return response()->json([
            'task' => $task,
        ]);
    }
    // public function addtask(Request $request)
    // {
    //     $request->validate([
    //         'task' => 'required|unique:add_tasks',
    //     ]);

    //     $res = new AddTask();
    //     $res->task = $request->input('task');
    //     $res->save();
    //     return redirect()
    //         ->back()
    //         ->with('success', 'New Task Added Successfully');
    // }

    public function addtask(Request $request)
    {
        $request->validate([
            'task' => 'required|unique:add_tasks',
        ]);
        $model = new AddTask();
        $model->task = $request->post('task');
        $model->save();
        return ['msg' => 'Data Inserted'];
    }

    public function destroy(AddTask $AddTask, $id)
    {
        AddTask::destroy(['id', $id]);
        return redirect()
            ->back()
            ->with('fail', 'Task Deleted Successfully');
    }
}

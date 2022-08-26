<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::orderBy('id', 'DESC')->get();
        return view('welcome', compact('todo'));
    }
    public function addtask(Request $request)
    {
        $task = new Todo();
        $task->task = $request->task;
        $task->save();
        return response()->json($task);
    }

    public function getTaskById($id)
    {
        $task = Todo::find($id);
        return response()->json($task);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json(['success' => 'Record has been deleted']);
    }
}

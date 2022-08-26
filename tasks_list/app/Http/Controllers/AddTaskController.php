<?php

namespace App\Http\Controllers;

use App\Models\AddTask;
use Illuminate\Http\Request;

class AddTaskController extends Controller
{
    public function index()
    {
        $items = AddTask::all();
        //return $items;
        return view('list', compact('items'));
    }

    public function create(Request $request)
    {
        $item = new AddTask();
        $item->item = $request->text; // ->item from DB
        $item->save();
        return 'Done';
    }

    public function delete(Request $request)
    {
        AddTask::where('id', $request->id)->delete();
        return $request->all();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            // rules
            'value' => 'required|min:3|max:255',
        ]);
        $item = AddTask::find($request->id);
        $item->item = $request->value;
        $item->save();
        return $request->all();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Addtask;
use Illuminate\Http\Request;

class AddtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', ['addtasks' => Addtask::orderBy('id', 'DESC')->get()]);
    }

    public function form_submit(Request $request)
    {
        $data = new Addtask();
        $data->task = $request->post('task');
        $data->save();
    }
}

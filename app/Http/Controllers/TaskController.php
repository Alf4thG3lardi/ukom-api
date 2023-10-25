<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = task::all();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = task::create([
            'project_id' => $request->project_id,
            'task_name' => $request->task_name,
            'desc' => $request->desc,
            'assigned_to' => $request->assigned_to,
            'priority' => $request->priority,
            'status' => $request->status,
            'deadline' => $request->deadline,
        ]);

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        return response()->json([
            'data' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->desc = $request->desc;
        $task->assigned_to = $request->assigned_to;
        $task->priority = $request->priority;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();

        return response()->json([
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'data deleted'
        ]);
    }
}

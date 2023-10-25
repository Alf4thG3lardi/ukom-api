<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = project::all();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = project::create([
            'project_name' => $request->project_name,
            'desc' => $request->desc,
            'start' => $request->start,
            'end' => $request->end,
            'client_id' => $request->client_id,
            'status' => $request->status,
            'price' => $request->price
        ]);

        return response()->json([
            'data'=> $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return response()->json([
            'data' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        $project->project_name = $request->project_name;
        $project->desc = $request->desc;
        $project->start = $request->start;
        $project->end = $request->end;
        $project->client_id = $request->client_id;
        $project->status = $request->status;
        $project->price = $request->price;
        $project->save();

        return response()->json([
            'data' => $project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return response()->json([
            'message' => 'project deleted'
        ]);
    }
}

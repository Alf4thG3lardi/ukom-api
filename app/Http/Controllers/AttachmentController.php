<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = attachment::all();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = attachment::create([
            'task_id' => $request->task_id,
            'filename' => $request->filename,
            'filepath' => $request->filepath,
            'upload_time' => $request->upload_time,
            'uploaded_by' => $request->uploaded_by,
        ]);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(attachment $attachment)
    {
        return response()->json([
            'data' => $attachment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attachment $attachment)
    {
        $attachment->task_id = $request->task_id;
        $attachment->filename = $request->filename;
        $attachment->filepath = $request->filepath;
        $attachment->upload_time = $request->upload_time;
        $attachment->uploaded_by = $request->uploaded_by;
        $attachment->save();

        return response()->json([
            'data' => $attachment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attachment $attachment)
    {
        $attachment->delete();
        return response()->json([
            'message' => 'data deleted'
        ]);
    }
}

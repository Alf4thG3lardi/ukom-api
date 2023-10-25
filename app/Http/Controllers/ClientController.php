<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = client::all();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = client::create([
            'username' => $request->username,
            'password' => base64_encode($request->password),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'contact' => $request->contact,
            'role' => $request->role,
        ]);

        return response()->json([
            "data" => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        return response()->json([
            "data" => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        $client->username = $request->username;
        $client->password = base64_encode($request->password);
        $client->fullname = $request->fullname;
        $client->email = $request->email;
        $client->contact = $request->contact;
        $client->role = $request->role;
        $client->save();

        return response()->json([
            'data' => $client
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();
        return response()->json([
            'message' => "client deleted"
        ]);
    }
}

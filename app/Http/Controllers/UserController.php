<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(['success'=> true, 'data'=>$user], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::store($request);
        return response()->json(['success'=> true, 'data'=>$user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user){
            return response()->json(['message'=>'Not find iD '.$id],404);
        };
        $user = new UserResource($user);
        return response()->json(['success'=> true, 'data'=>$user], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::store($request, $id);
        return response()->json(['success'=> true, 'message'=>'delete successful'], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success'=> true, 'data'=>$user], 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(23);
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        // dd(234);
        $drone = Drone::store($request);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd(90);
        $drone = Drone::find($id);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drone = Drone::store($request, $id);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone =Drone::find($id);
        $drone->delete();
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }
}

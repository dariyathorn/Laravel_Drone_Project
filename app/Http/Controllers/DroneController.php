<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneLocationResource;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        // dd($drone);
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drone = Drone::store($request);
        // dd($drone);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drone = Drone::find($id);
        dd($id);
        
        $drone = new DroneResource($drone);
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

    public function locationDrone($id){
        $drone = Drone::find($id);
        $drone = new DroneLocationResource($drone);
        return response()->json(['success'=>true, 'data' =>$drone], 200);
        
    }
}

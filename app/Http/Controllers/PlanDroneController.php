<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanDroneResource;
use App\Models\PlanDrone;
use Illuminate\Http\Request;

class PlanDroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insturction = PlanDrone::all();
        // dd($insturction);
        $insturction = PlanDroneResource::collection($insturction);
        return response()->json(['success'=>true, 'data' =>$insturction], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insturction = PlanDrone::store($request);
        return response()->json(['success'=>true, 'data' =>$insturction], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(PlanDrone $planDrone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $drone_id)
    {
        $drone = PlanDrone::where('drone_id', $drone_id)->first();
        if (!$drone){
            return response()->json(['success'=>false, 'data' => 'Can not found '.$drone_id], 404);
        }
        $drone -> update($request->all());
        return response()->json(['success'=>true, 'data' =>$drone], 200);
        
        // dd($drone);

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanDrone $planDrone)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DronePlanRequest;
use App\Models\DronePlan;
use Illuminate\Http\Request;

class DronePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dronePlan = DronePlan::find();
        $dronePlan = DronePlan::collection($dronePlan);
        return response()->json(['success'=>true, 'data' =>$dronePlan], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DronePlanRequest $request)
    {
        $dronePlan = DronePlan::store($request);
        return response()->json(['success'=>true, 'data' =>$dronePlan], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dronePlan = DronePlan::store($id);
        return response()->json(['success'=>true, 'data'=>$dronePlan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dronePlan = DronePlan::find($request, $id);
        return response()->json(['success'=>true, 'data'=>$dronePlan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dronePlan = DronePlan::find($id);
        $dronePlan -> delete();
        return response()->json(['message'=>true, 'data'=>$dronePlan], 200);
    }
}

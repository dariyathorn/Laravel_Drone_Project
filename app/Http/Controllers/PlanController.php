<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResuorce;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1234);
        $plan = Plan::all();
        $plan = PlanResuorce::collection($plan);
        return response()->json(['success'=>true, 'data' =>$plan], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        $plan = Plan::store($request);
        return response()->json(['success'=> true, 'data'=>$plan], 200);
        // dd(123);
        $plan = Plan::store($request);
        return response()->json(['success'=>true, 'data' =>$plan], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plan = Plan::find($id);
        $plan = new PlanResuorce($plan);
        return response()->json(['success'=>true, 'data' =>$plan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $plan = Plan::store($request, $id);
        return response()->json(['success'=>true, 'data' =>$plan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        $plan -> delete();
        return response()->json(['success'=>true, 'data' =>$plan], 200);
    }

    public function getPlan($type){
        $plan = Plan::all();
        $plan = Plan::where('type', 'like', "%".$type."%");
        $plan = PlanResuorce::collection($plan);
        return response()->json(['success'=>true, 'data' =>$plan], 200);
    }
}

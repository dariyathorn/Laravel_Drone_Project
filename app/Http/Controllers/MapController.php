<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapResource;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(23);
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['success'=>true, 'data' =>$maps], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request)
    {
        // dd(234);
        $maps = Map::store($request);
        return response()->json(['success'=>true, 'data' =>$maps], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd(90);
        $maps = Map::find($id);
        return response()->json(['success'=>true, 'data' =>$maps], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $maps = Map::store($request, $id);
        return response()->json(['success'=>true, 'data' =>$maps], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maps =Map::find($id);
        $maps->delete();
        return response()->json(['success'=>true, 'data' =>$maps], 200);
    }
}

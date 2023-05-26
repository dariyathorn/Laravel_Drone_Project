<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapResource;
use App\Models\Farm;
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
    public function DownloadImage($name, $farm_id){
        $map = Map::where('name', $name)->first();
        if (!isset($map)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$name], 200);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$farm_id], 404);
        }
        return response()->json(['success' => true, 'message' => 'Download image successfully', 'data' =>$map->image], 200);
    }

    public function DeleteImage($name, $farm_id){
        $map = Map::where('name', $name)->first();
        if (!isset($map)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$name], 200);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$farm_id], 404);
        }
        $map->image= "null" ;
        $map->save();
        return response()->json(['success' => true, 'message' => 'Delete image successfully'], 200);
    }
    
    public function addImage($name, $farm_id){
        $map = Map::where('name', $name)->first();
        if (!isset($map)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$name], 200);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)){
            return response()->json(['success'=>false, 'message' =>'Can not found'.$farm_id], 404);
        }
        $map->image = request('image');
        $map->save();
        return response()->json(['success' => true, 'message' => 'Request farm successfully', 'data' =>$map->image], 200);
    }
}

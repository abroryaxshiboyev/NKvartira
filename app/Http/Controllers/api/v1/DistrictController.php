<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\District\StoreDistrictRequest;
use App\Http\Requests\District\UpdateDistrictRequest;
use App\Http\Resources\District\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
  
    public function index(Request $request)
    {
        $data=District::all();
        $total=$data->count();
        if($limit=$request->input('limit')){
            $data=District::paginate($limit);
            $total=$data->total();
        }
        return response()->json([
            'message' => 'All districts',
            'data' => DistrictResource::collection($data),
            'total'=>$total
        ]);
    }

   
    public function store(StoreDistrictRequest $request)
    {
        $data=District::create($request->validated());
        return response()->json([
            'message' => 'District created',
            'data'=>new DistrictResource($data)
        ],201);
    }

   
    public function show(District $district)
    {
        return response()->json([
            'message'=>'one district',
            'data'=>new DistrictResource($district)
        ]);
    }


    public function update(UpdateDistrictRequest $request, District $district)
    {
        // $district=District::findOrFail($id);
        $district->update($request->validated());
        // $data=District::find($district->id);
        return response()->json([
            'message'=>'District updated',
            'data'=>new DistrictResource($district)
        ]);
    }


    public function destroy(District $district)
    {
        $district->delete();
        return response()->json([
            'message'=>'District deleted'
        ]);
    }
}

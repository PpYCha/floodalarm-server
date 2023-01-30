<?php

namespace App\Http\Controllers;

use App\Events\NewDataAdded;
use App\Models\WaterLevel;
use Illuminate\Http\Request;

class WaterLevelController extends Controller
{

    public function index()
    {

        $latestData = WaterLevel::latest()->first();
        return response()->json([
            'status' => 200,
            'message' => 'measure get Successfully',
            'data' => $latestData,
        ]);

    }

    public function store(Request $request)
    {
        $waterArray = array(
            "measure" => $request->measure,
        );
        $water = WaterLevel::create($waterArray);
        event(new NewDataAdded($water));
    }

    public function edit(WaterLevel $waterLevel)
    {
        //
    }

    public function destroy(WaterLevel $waterLevel)
    {
        //
    }
}
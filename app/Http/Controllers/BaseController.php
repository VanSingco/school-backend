<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getRegionProvinceCityBrgy()
    {
        $region = json_decode(file_get_contents(storage_path('/app') . "/json/refregion.json"), true);
        $province = json_decode(file_get_contents(storage_path('/app') . "/json/refprovince.json"), true);
        $city = json_decode(file_get_contents(storage_path('/app') . "/json/refcitymun.json"), true);
        $barangay = json_decode(file_get_contents(storage_path('/app') . "/json/refbrgy.json"), true);


        return response()->json([
            'region' => $region['RECORDS'],
            'province' => $province['RECORDS'],
            'city' => $city["RECORDS"],
            'barangay' => $barangay['RECORDS'],
        ], 200);
    }
    
}

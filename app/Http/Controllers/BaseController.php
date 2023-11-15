<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getRegionProvinceCityBrgy()
    {
        $region = json_decode(file_get_contents(public_path('/') . "/json/refregion.json"), true);
        $province = json_decode(file_get_contents(public_path('/') . "/json/refprovince.json"), true);
        $city = json_decode(file_get_contents(public_path('/') . "/json/refcitymun.json"), true);
        $barangay = json_decode(file_get_contents(public_path('/') . "/json/refbrgy.json"), true);


        return response()->json([
            'region' => $region['RECORDS'],
            'province' => $province['RECORDS'],
            'city' => $city["RECORDS"],
            'barangay' => $barangay['RECORDS'],
        ], 200);
    }

    public function getConfiguration() {
        
        return response()->json([
            'user' => config('school.user'),
            'student' => config('school.student'),
            'family' => config('school.family'),
            'teacher' => config('school.teacher'),
            'score' => config('school.score'),
            'subject' => config('school.subject'),
            'school' => config('school.school'),
        ]);
    }
    
}

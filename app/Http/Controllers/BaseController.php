<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getRegion()
    {
        $path = storage_path('/app') . "/json/refregion.json";
        
        return json_decode(file_get_contents($path), true);
    }

    public function getProvince()
    {
        $path = storage_path('/app') . "/json/refprovince.json";

        return json_decode(file_get_contents($path), true);
    }

    public function getCity()
    {
        $path = storage_path('/app') . "/json/refcitymun.json";

        return json_decode(file_get_contents($path), true);
    }

    public function getBarangay()
    {
        $path = storage_path('/app') . "/json/refbrgy.json";

        return json_decode(file_get_contents($path), true);
    }

    
}

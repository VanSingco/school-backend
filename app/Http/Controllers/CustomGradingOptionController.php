<?php

namespace App\Http\Controllers;

use App\Actions\CustomGradingOptionAction\CustomGradingOptionCreate;
use App\Actions\CustomGradingOptionAction\CustomGradingOptionDelete;
use App\Actions\CustomGradingOptionAction\CustomGradingOptionList;
use App\Actions\CustomGradingOptionAction\CustomGradingOptionShow;
use App\Actions\CustomGradingOptionAction\CustomGradingOptionUpdate;
use App\Models\CustomGradingOption;
use Illuminate\Http\Request;

class CustomGradingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(CustomGradingOptionList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(CustomGradingOptionCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(CustomGradingOptionShow::run($id), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(CustomGradingOptionUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(CustomGradingOptionDelete::run($id), 200);
    }
}

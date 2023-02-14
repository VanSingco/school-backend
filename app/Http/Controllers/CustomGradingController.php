<?php

namespace App\Http\Controllers;

use App\Actions\CustomGradingAction\CustomGradingCreate;
use App\Actions\CustomGradingAction\CustomGradingDelete;
use App\Actions\CustomGradingAction\CustomGradingList;
use App\Actions\CustomGradingAction\CustomGradingShow;
use App\Actions\CustomGradingAction\CustomGradingUpdate;
use App\Models\CustomGrading;
use Illuminate\Http\Request;

class CustomGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(CustomGradingList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(CustomGradingCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(CustomGradingShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(CustomGradingUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(CustomGradingDelete::run($id), 200);
    }
}

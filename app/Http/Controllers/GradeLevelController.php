<?php

namespace App\Http\Controllers;

use App\Actions\GradeLevelAction\GradeLevelCreate;
use App\Actions\GradeLevelAction\GradeLevelDelete;
use App\Actions\GradeLevelAction\GradeLevelList;
use App\Actions\GradeLevelAction\GradeLevelShow;
use App\Actions\GradeLevelAction\GradeLevelUpdate;
use App\Models\GradeLevel;
use App\Services\GradeLevelService;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
       return response()->json(GradeLevelList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(GradeLevelCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(GradeLevelShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(GradeLevelUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(GradeLevelDelete::run($id), 200);
    }
}

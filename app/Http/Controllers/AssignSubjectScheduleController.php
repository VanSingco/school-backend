<?php

namespace App\Http\Controllers;

use App\Actions\AssignSubjectScheduleAction\AssignSubjectScheduleCreate;
use App\Actions\AssignSubjectScheduleAction\AssignSubjectScheduleDelete;
use App\Actions\AssignSubjectScheduleAction\AssignSubjectScheduleList;
use App\Actions\AssignSubjectScheduleAction\AssignSubjectScheduleShow;
use App\Actions\AssignSubjectScheduleAction\AssignSubjectScheduleUpdate;
use App\Http\Requests\AssignSubjectScheduleRequest;
use Illuminate\Http\Request;

class AssignSubjectScheduleController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(AssignSubjectScheduleList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignSubjectScheduleRequest $request)
    {
        return response()->json(AssignSubjectScheduleCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(AssignSubjectScheduleShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignSubjectScheduleRequest $request, $id)
    {
        return response()->json(AssignSubjectScheduleUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(AssignSubjectScheduleDelete::run($id), 200);
    }
}

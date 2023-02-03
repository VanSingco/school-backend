<?php

namespace App\Http\Controllers;

use App\Actions\AssignSubjectAction\AssignSubjectCreate;
use App\Actions\AssignSubjectAction\AssignSubjectDelete;
use App\Actions\AssignSubjectAction\AssignSubjectList;
use App\Actions\AssignSubjectAction\AssignSubjectShow;
use App\Actions\AssignSubjectAction\AssignSubjectUpdate;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(AssignSubjectList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(AssignSubjectCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(AssignSubjectShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(AssignSubjectUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(AssignSubjectDelete::run($id), 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\TeacherAction\TeacherCreate;
use App\Actions\TeacherAction\TeacherDelete;
use App\Actions\TeacherAction\TeacherList;
use App\Actions\TeacherAction\TeacherShow;
use App\Actions\TeacherAction\TeacherUpdate;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(TeacherList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        return response()->json(TeacherCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(TeacherShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, $id)
    {
        return response()->json(TeacherUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(TeacherDelete::run($id), 200);
    }
}

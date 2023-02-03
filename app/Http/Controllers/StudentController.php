<?php

namespace App\Http\Controllers;

use App\Actions\StudentAction\StudentCreate;
use App\Actions\StudentAction\StudentDelete;
use App\Actions\StudentAction\StudentList;
use App\Actions\StudentAction\StudentShow;
use App\Actions\StudentAction\StudentUpdate;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(StudentList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        return response()->json(StudentCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(StudentShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, $id)
    {
        return response()->json(StudentUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(StudentDelete::run($id), 200);
    }
}

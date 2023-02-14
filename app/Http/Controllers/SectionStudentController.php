<?php

namespace App\Http\Controllers;

use App\Actions\SectionAction\SectionAddStudents;
use App\Actions\SectionAction\SectionRemoveStudents;
use App\Actions\SectionAction\SectionStudentList;
use Illuminate\Http\Request;

class SectionStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(SectionStudentList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(SectionAddStudents::run($request), 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(SectionRemoveStudents::run($id), 200);
    }
}

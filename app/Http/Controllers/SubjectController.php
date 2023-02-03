<?php

namespace App\Http\Controllers;

use App\Actions\SubjectAction\SubjectCreate;
use App\Actions\SubjectAction\SubjectDelete;
use App\Actions\SubjectAction\SubjectList;
use App\Actions\SubjectAction\SubjectShow;
use App\Actions\SubjectAction\SubjectUpdate;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(SubjectList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        return response()->json(SubjectCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(SubjectShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, $id)
    {
        return response()->json(SubjectUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(SubjectDelete::run($id), 200);
    }
}

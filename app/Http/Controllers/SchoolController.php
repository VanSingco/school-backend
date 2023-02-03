<?php

namespace App\Http\Controllers;

use App\Actions\SchoolAction\School as SchoolActionSchool;
use App\Actions\SchoolAction\SchoolCreate;
use App\Actions\SchoolAction\SchoolDelete;
use App\Actions\SchoolAction\SchoolList;
use App\Actions\SchoolAction\SchoolUpdate;
use App\Http\Requests\SchoolRequest;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(SchoolList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        return response()->json(SchoolCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(SchoolActionSchool::run('id', $id), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, $id)
    {
        return response()->json(SchoolUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(SchoolDelete::run($id), 200);
    }


    public function getSchoolBySubdomain($subdomain)
    {
        return response()->json(SchoolActionSchool::run('subdomain', $subdomain), 200);
    }
}

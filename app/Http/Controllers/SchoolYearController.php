<?php

namespace App\Http\Controllers;

use App\Actions\SchoolYearAction\SchoolYearCreate;
use App\Actions\SchoolYearAction\SchoolYearDelete;
use App\Actions\SchoolYearAction\SchoolYearList;
use App\Actions\SchoolYearAction\SchoolYearShow;
use App\Actions\SchoolYearAction\SchoolYearUpdate;
use App\Http\Requests\SchoolYearRequest;
use App\Services\SchoolYearService;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
       return response()->json(SchoolYearList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolYearRequest $request)
    {
        return response()->json(SchoolYearCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(SchoolYearShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolYearRequest $request, $id)
    {
        return response()->json(SchoolYearUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(SchoolYearDelete::run($id), 200);
    }
}

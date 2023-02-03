<?php

namespace App\Http\Controllers;

use App\Actions\SectionAction\SectionCreate;
use App\Actions\SectionAction\SectionDelete;
use App\Actions\SectionAction\SectionList;
use App\Actions\SectionAction\SectionShow;
use App\Actions\SectionAction\SectionUpdate;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(SectionList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        return response()->json(SectionCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(SectionShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, $id)
    {
        return response()->json(SectionUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(SectionDelete::run($id), 200);
    }
}

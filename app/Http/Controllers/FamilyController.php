<?php

namespace App\Http\Controllers;

use App\Actions\FamilyAction\FamilyCreate;
use App\Actions\FamilyAction\FamilyDelete;
use App\Actions\FamilyAction\FamilyList;
use App\Actions\FamilyAction\FamilyShow;
use App\Actions\FamilyAction\FamilyUpdate;
use App\Http\Requests\FamilyRequest;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(FamilyList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request)
    {
        return response()->json(FamilyCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(FamilyShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyRequest $request, $id)
    {
        return response()->json(FamilyUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(FamilyDelete::run($id), 200);
    }
}

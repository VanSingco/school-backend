<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Services\GradeLevelService;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    public function __construct(GradeLevelService $gradeLevelService) {
        $this->gradeLevelService = $gradeLevelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
       return response()->json($this->gradeLevelService->list($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json($this->gradeLevelService->store($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->gradeLevelService->show($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json($this->gradeLevelService->update($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json($this->gradeLevelService->delete($id), 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    
    public function __construct(SchoolService $schoolService) {
        $this->schoolService = $schoolService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->schoolService->list($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json($this->schoolService->store($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->schoolService->show($id), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json($this->schoolService->update($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json($this->schoolService->delete($id), 200);
    }
}

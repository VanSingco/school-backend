<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolYearRequest;
use App\Services\SchoolYearService;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{

    public function __construct(SchoolYearService $schoolYearService) {
        $this->schoolYearService = $schoolYearService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
       return response()->json($this->schoolYearService->list($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolYearRequest $request)
    {
        return response()->json($this->schoolYearService->store($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->schoolYearService->show($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolYearRequest $request, $id)
    {
        return response()->json($this->schoolYearService->update($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json($this->schoolYearService->delete($id), 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjectService;
    
    public function __construct(SubjectService $subjectService) {
        $this->subjectService = $subjectService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($this->subjectService->list($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        return response()->json($this->subjectService->store($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->subjectService->show($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, $id)
    {
        return response()->json($this->subjectService->update($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        return response()->json($this->subjectService->delete($id, $request), 200);
    }
}

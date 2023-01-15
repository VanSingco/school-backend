<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacherService;
    
    public function __construct(TeacherService $teacherService) {
        $this->teacherService = $teacherService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($this->teacherService->list($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        return response()->json($this->teacherService->store($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->teacherService->show($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, $id)
    {
        return response()->json($this->teacherService->update($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        return response()->json($this->teacherService->delete($id, $request), 200);
    }
}

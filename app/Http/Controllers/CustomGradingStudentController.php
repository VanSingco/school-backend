<?php

namespace App\Http\Controllers;

use App\Actions\CustomGradingStudentAction\CustomGradingStudentCreate;
use App\Actions\CustomGradingStudentAction\CustomGradingStudentList;
use App\Actions\CustomGradingStudentAction\CustomGradingStudentUpdate;
use App\Models\CustomGradingStudent;
use Illuminate\Http\Request;

class CustomGradingStudentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(CustomGradingStudentList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(CustomGradingStudentCreate::run($request), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(CustomGradingStudentUpdate::run($id, $request), 200);
    }
}

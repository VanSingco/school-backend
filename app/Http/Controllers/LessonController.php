<?php

namespace App\Http\Controllers;

use App\Actions\LessonAction\LessonCreate;
use App\Actions\LessonAction\LessonDelete;
use App\Actions\LessonAction\LessonList;
use App\Actions\LessonAction\LessonShow;
use App\Actions\LessonAction\LessonUpdate;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(LessonList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        return response()->json(LessonCreate::run($request->all()), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(LessonShow::run($id), 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, $id)
    {
        return response()->json(LessonUpdate::run($id, $request->all()), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(LessonDelete::run($id), 200);
    }
}

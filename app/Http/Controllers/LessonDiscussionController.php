<?php

namespace App\Http\Controllers;

use App\Actions\LessonDiscussionDiscusstionAction\ListLessonDiscussion;
use App\Actions\LessonDiscusstionAction\LessonDiscussionCreate;
use App\Actions\LessonDiscusstionAction\LessonDiscussionDelete;
use App\Actions\LessonDiscusstionAction\LessonDiscussionList;
use App\Actions\LessonDiscusstionAction\LessonDiscussionShow;
use App\Actions\LessonDiscusstionAction\LessonDiscussionUpdate;
use App\Http\Requests\LessonDiscussionRequest;
use App\Models\LessonDiscussion;
use Illuminate\Http\Request;

class LessonDiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(LessonDiscussionList::run($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonDiscussionRequest $request)
    {
        return response()->json(LessonDiscussionCreate::run($request->all()), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(LessonDiscussionShow::run($id), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(LessonDiscussionRequest $request, $id)
    {
        return response()->json(LessonDiscussionUpdate::run($id, $request->all()), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(LessonDiscussionDelete::run($id), 200);
    }
}

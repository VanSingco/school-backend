<?php

namespace App\Http\Controllers;

use App\Actions\UserAction\UserCreate;
use App\Actions\UserAction\UserDelete;
use App\Actions\UserAction\UserList;
use App\Actions\UserAction\UserShow;
use App\Actions\UserAction\UserUpdate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(UserList::run($request), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(UserCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(UserShow::run($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(UserUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(UserDelete::run($id), 200);
    }
}
